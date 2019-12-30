<?php namespace App\Controllers;
use App\Models\DepoimentosModel;
use App\Models\ServicosModel;
use App\Models\ArtigosModel;
use App\Models\PagesModel;
use CodeIgniter\Controller;

class Email extends BaseController
{
    public function enviar(){
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
            'emailEnvio'=>'marcoslopesg7@gmail.com',
            'nome'=>$this->request->getVar('nome'),
            'telefone'=>$this->request->getVar('telefone'),
            'email'=>$this->request->getVar('email'),
            'mensagem'=> $this->request->getVar('mensagem')
        ];

        $data = [
            'status'=>true,
            'message'=>'Mensagem enviada com sucesso, Aguarde nosso contato.'
        ];

        if($this->enviarEmail($email)){
            $this->session->setFlashdata('save', $data);
            $this->enviarEmail(
                [
                    'emailEnvio'=>$email['email'],
                    'nome'=>'E-mail de confirmação de contato.',
                    'telefone'=>'(67) 99834 - 3255',
                    'email'=>'marcoslopesg7@gmail.com',
                    'mensagem'=> "Obrigado por entrar em contato, entraremos em contato em breve, pelo telefone {$email["telefone"]} referente a mensagem: {$email["mensagem"]}"
                ]
            );
			return redirect()->to('/#fale-conosco');
        }else{
            $data['status'] = false;
            $data['message'] = 'Não foi possivel enviar mensagem, tente novamente.';
            $this->session->setFlashdata('save', $data);
			return redirect()->to('/#fale-conosco');
        }
    }
    private function enviarEmail($email){
        
        $emailEnvio = $email['emailEnvio'];
        $headers.= "From: {$email["email"]} <{$email["email"]}>";

        $envio = mail($email['emailEnvio'],'Contato com nossa equipe !',$email["mensagem"], $headers);

        if($envio){
            return true;
        }else{
            return false;
        }
    }
}