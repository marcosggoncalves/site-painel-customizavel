<?php namespace App\Controllers;
use App\Models\DepoimentosModel;
use App\Models\ServicosModel;
use App\Models\ArtigosModel;
use App\Models\PagesModel;
use CodeIgniter\Controller;

class Email extends BaseController
{
    public function enviar(){
        $email = [
            'emailEnvio'=>'marcoslopesg7@gmail.com',
            'nome'=>$this->request->getVar('nome'),
            'telefone'=>$this->request->getVar('telefone'),
            'email'=>$this->request->getVar('email'),
            'mensagem'=> $this->request->getVar('mensagem')
        ];

        $data = [
            'status'=>true,
            'message'=>'Mensagem enviada com sucesso, Aguarde nosso contato'
        ];

        if($this->enviarEmail($email)){
            $this->session->setFlashdata('save', $data);
            $this->enviarEmail(
                [
                    'emailEnvio'=>$email['email'],
                    'nome'=>'Contato com empresa',
                    'telefone'=>'(67) 99834 - 3255',
                    'email'=>'marcoslopesg7@gmail.com',
                    'mensagem'=> "Obrigado por entrar em contato, entraremos em contato em breve, pelo telefone {$email["telefone"]} Mensagem: {$email["mensagem"]}"
                ]
            );
			return redirect('/');
        }else{
            $data['status'] = false;
            $data['message'] = 'Não foi possivel enviar mensagem, tente novamente';
            $this->session->setFlashdata('save', $data);
			return redirect('/');
        }
    }
    private function enviarEmail($email){
        
        $emailEnvio = $email['emailEnvio'];
        $headers  = "MIME-Version: 1.0". "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: {$email["nome"]} <{$email["nome"]}>";

        $envio = mail( $email['emailEnvio'], $email["mensagem"], $headers);

        if($enviaremail){
            return true;
        }else{
            return false;
        }
    }
}