<?php namespace App\Controllers;

use App\Models\ProfissionaisModel;
use CodeIgniter\Controller;

class Profissionais extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new ProfissionaisModel();
    }
	public function index()
	{
		$data = [
			'profissionais'=> $this->model->getProfissionais(),
			'titulo' => 'Profissionais | Equipe - painelSite'
		];

		return view('profissionaisCadastrar',$data);
	}
	public function save()
	{

		$validation = \Config\Services::validation();


		$validate = $this->validate([
			'nome'  => 'required',
			'sobre'=>'required',
			'imagem' => [
                'uploaded[imagem]',
                'mime_in[imagem,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[imagem,7096]'
            ],
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel cadastrar profissional !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-profissionais');
		}else{
			$Img = $this->request->getFile('imagem');
			$newName = $Img->getRandomName();
			$Img->move('uploads',$newName);
			
			$data = [
				'status'=>false,
				'message'=>'Não foi possivel cadastrar profissional !'
			];
			
			$profissional = [
				'curriculo_profissional' => 'uploads/'.$Img->getName(),
				'sobre_profissional' => $this->request->getVar('sobre'),
				'nome_profissional' => $this->request->getVar('nome'),
			];

			$save = $this->model->newProfissional($profissional);

			if($save){
				$data['message'] = "Profissional cadastrado com sucesso !";
				$data['status'] = true;
			}
			$this->session->setFlashdata('save', $data);
			return redirect('painel-profissionais');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');
		$profissional = $this->model->getProfissional($id);

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir imagem, no entanto o porfissional foi excluido !'
		];

		if(file_exists($profissional[0]['curriculo_profissional'])){
			$excluirFile = unlink($profissional[0]['curriculo_profissional']);
	
			if($excluirFile){
				$data['message'] = "Profissional excluido com sucesso !";
				$data['status'] = true;
			}
		}

		$this->model->deleteProfissional($id);
		$this->session->setFlashdata('save', $data);
		return redirect('painel-profissionais');
	}
	public function edit($id)
	{
		$profissional = $this->model->getProfissional($id);

		$validate = $this->validate([
			'nome-edit'  => 'required',
			'sobre-edit'=>'required'
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel publicar profissional !'
			];
			$this->session->setFlashdata('save', $data);
			return redirect('painel-profissionais');
		}

	
		$profissionalEdit = [
			'sobre_profissional' => $this->request->getVar('sobre-edit'),
			'nome_profissional' => $this->request->getVar('nome-edit'),
		];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar profissional !'
		];

		$Img = $this->request->getFile('imagem-edit');

		if($Img != ""){

			if(file_exists($profissional[0]['curriculo_profissional'])){
				$excluirFile = unlink($profissional[0]['curriculo_profissional']);
		
				if(!$excluirFile){
					$this->session->setFlashdata('save', $data);
					return redirect('painel-profissionais');
				}
			}
			$newName = $Img->getRandomName();
			$Img->move('uploads',$newName);
			$profissionalEdit['curriculo_profissional'] =  'uploads/'.$Img->getName();
		}

		$savedit = $this->model->editProfissional($id,$profissionalEdit);

		if($savedit){
			$data['message'] = "Profissional alterado com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect('painel-profissionais');
	}
}
