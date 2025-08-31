<?php namespace App\Controllers;
use App\Models\ConfigPageModel;
use CodeIgniter\Controller;

class Email extends BaseController
{
    public function __construct()
    {
        helper('url');
        
        $this->config = new ConfigPageModel();
    }
    public function enviar(){

        $emailConfig  = $this->config->config('emailEnvio');
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'nome'  => 'required',
            'telefone'  => 'required',
            'email'  => 'required',
            'mensagem'  => 'required'
        ]);
        
        if(!$validate){
            $data = [
                'validate'=>$this->validator->listErrors(),
                'status'=>false,
                'message'=>'Não foi possivel enviar e-mail.'
            ];
    
            $this->session->setFlashdata('save', $data);
            return redirect()->to('/#fale-conosco');
        }
        
        
        $email = [
            'emailEnvio'=>"{$emailConfig[0]['valueConfig']}",
            'nome'=>$this->request->getVar('nome'),
            'telefone'=>$this->request->getVar('telefone'),
            'email'=>$this->request->getVar('email'),
            'mensagem'=> $this->request->getVar('mensagem')
        ];

        $data = [
            'status'=>true,
            'message'=>'<h1>Mensagem enviada com sucesso, Aguarde nosso contato.</h1>'
        ];

        if($this->enviarEmail($email)){
            $this->session->setFlashdata('save', $data);
            $this->enviarEmail(
                [
                    'emailEnvio'=>$email['email'],
                    'nome'=>'E-mail de confirmação de contato.',
                    'telefone'=>'(67) 9810-2493',
                    'email'=>"{$emailConfig[0]['valueConfig']}",
                    'mensagem'=> "Obrigado por entrar em contato conosco, estaremos retornando em breve, pelo telefone {$email["telefone"]}, \n referente: {$email["mensagem"]}"
                ]
            );
            return redirect()->to('/#fale-conosco');
        }else{
            $data['status'] = false;
            $data['message'] = '<h1>Não foi possivel enviar mensagem, tente novamente.</h1>';
            $this->session->setFlashdata('save', $data);
            return redirect()->to('/#fale-conosco');
        }
    }
    private function enviarEmail($email){
        $headers = "MIME-Version: 1.1\r\n";
        
        $emailEnvio = $email['emailEnvio'];
        $headers.= "From: {$email["email"]} <{$email["email"]}>";

        $envio = mail($email['emailEnvio'],'Soluções Digitais',$email["mensagem"], $headers,"-r".$email['email']);

        if($envio){
            return true;
        }else{
            return false;
        }
    }
}