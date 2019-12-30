<?php namespace App\Controllers;

use App\Models\DepoimentosModel;
use App\Models\ServicosModel;
use App\Models\ArtigosModel;
use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class Admin extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->Artigos = new ArtigosModel();
		$this->Servicos = new ServicosModel();
		$this->Depoimentos = new DepoimentosModel();
		$this->Usuarios = new UsuariosModel();

	}
	public function index()
	{

		$data = [
			'artigos'=> $this->Artigos->getArtigos(),
			'servicos'=> $this->Servicos->getServicos(),
			'depoimentos'=> $this->Depoimentos->getDepoimentos(),
			'usuarios'=> $this->Usuarios->getUsuarios(),
			'titulo' => 'Painel geral - painelSite'
		];

		return view('admin',$data);
	}
	public function login()
	{
		$data = [
			'titulo'=>"Acessar painelSite"
		];

		return view('login',$data);
	}

	public function entrar()
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'email'  => 'required',
			'senha'  => 'required',
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel acessar o painelSite !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('entrar');
		}else{
			$data = [
				'status'=>false,
				'message'=>'E-mail/senha incorretos'
			];
			$find = [
				'email'=>$this->request->getVar('email'),
				'senha'=> md5($this->request->getVar('senha'))
			];
		
			$entrar = $this->Usuarios->usuarioEntrar($find);

			if(count($entrar) === 0){
				$this->session->setFlashdata('save', $data);
				return redirect('entrar');
			}
			$session = [
				'user'=>$entrar,
				'logado'=>true
			];
			$this->session->set('login',$session);
			return redirect('painel');
		}
	}
	public function sair(){
		$this->session->destroy();
		return redirect('entrar');
		
	}
}
