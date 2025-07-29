<?php namespace App\Controllers;
use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class Usuarios extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new UsuariosModel();
    }
	public function index()
	{
		$data = [
			'usuarios'=> $this->model->getUsuarios(),
			'titulo' => 'Usuários - painelSite'
		];

		return view('usuariosCadastrar',$data);
	}
	public function save()
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'usuario'  => 'required',
            'email'  => 'required',
			'senha'  => 'required',
			'setor' => 'required'
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar usuário !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-usuarios');
		}else{

			$data = [
				'status'=>false,
				'message'=>'Não foi possivel salvar usuário !'
			];
			
			$session = \Config\Services::session($config);

			$usuario = [
				'usuario'=>$this->request->getVar('usuario'),
                'email'=> $this->request->getVar('email'),
				'senha'=> md5($this->request->getVar('senha')),
				'setor'=> $this->request->getVar('setor'),
			];

			$save = $this->model->newUsuario($usuario);

			if($save){
				$data['message'] = "Usuário salvo com sucesso !";
				$data['status'] = true;
			}
			
			$this->session->setFlashdata('save', $data);
			return redirect('painel-usuarios');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');
		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir usuário !'
		];

		$delete = $this->model->deleteUsuario($id);
		
		if($delete){
			$data['status'] = true;
			$data['message'] = 'Usuário deletado com sucesso !';
		}

		$this->session->setFlashdata('save', $data);
		return redirect('painel-usuarios');
	}
	public function edit($id)
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'usuario-edit'  => 'required',
            'email-edit'  => 'required',
			'senha-edit'  => 'required',
			'setor-edit' => 'required'
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar usuário !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-usuarios');
		}

		$usuario = [
            'usuario'=>$this->request->getVar('usuario-edit'),
            'email'=> $this->request->getVar('email-edit'),
			'senha'=> md5($this->request->getVar('senha-edit')),
			'setor'=> $this->request->getVar('setor-edit')
        ];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar usuário !'
		];

		$savedit = $this->model->editUsuario($id,$usuario);

		if($savedit){
			$data['message'] = "Usuários alterado com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect('painel-usuarios');
	}
}
