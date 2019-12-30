<?php namespace App\Controllers;

use App\Models\ArtigosModel;
use CodeIgniter\Controller;

class Artigos extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new ArtigosModel();
    }
	public function index()
	{
		$data = [
			'artigos'=> $this->model->getArtigos(),
			'titulo' => 'Artigos - painelSite'
		];

		return view('artigosCadastrar',$data);
	}
	public function save()
	{

		$validation = \Config\Services::validation();


		$validate = $this->validate([
			'titulo'  => 'required',
			'descrição'  => 'required',
			'imagem-artigo' => [
                'uploaded[imagem-artigo]',
                'mime_in[imagem-artigo,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[imagem-artigo,4096]'
            ],
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel publicar artigo !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-artigos');
		}else{
			$artigoImg = $this->request->getFile('imagem-artigo');
			$newName = $artigoImg->getRandomName();
			$artigoImg->move('uploads',$newName);
			
			$data = [
				'status'=>false,
				'message'=>'Não foi possivel publicar artigo !'
			];
			
			$session = \Config\Services::session($config);

			$artigo = [
				'img_artigo' => 'uploads/'.$artigoImg->getName(),
				'titulo'  => $this->request->getVar('titulo'),
				'descricao_artigo'  => $this->request->getVar('descrição'),
			];

			$save = $this->model->newArtigo($artigo);

			if($save){
				$data['message'] = "Artigo publicado com sucesso !";
				$data['status'] = true;
			}
			$this->session->setFlashdata('save', $data);
			return redirect('painel-artigos');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');
		$artigo = $this->model->getArtigo($id);

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir imagem, no entanto o artigo foi excluido !'
		];

		if(file_exists($artigo[0]['img_artigo'])){
			$excluirFile = unlink($artigo[0]['img_artigo']);
	
			if($excluirFile){
				$data['message'] = "Artigo excluido com sucesso !";
				$data['status'] = true;
			}
		}

		$this->model->deleteArtigo($id);
		$this->session->setFlashdata('save', $data);
		return redirect('painel-artigos');
	}
	public function edit($id)
	{
		$artigo = $this->model->getArtigo($id);

		$validate = $this->validate([
			"titulo-edit"  => "required",
			"descrição-edit{$artigo[0]['id_artigo']}"  => "required"
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel publicar artigo !'
			];
			$this->session->setFlashdata('save', $data);
			return redirect('painel-artigos');
		}

		$artigoEdit = [
			'titulo'  => $this->request->getVar('titulo-edit'),
			'descricao_artigo'  => $this->request->getVar("descrição-edit{$artigo[0]['id_artigo']}"),
		];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar artigo !'
		];

		$artigoImg = $this->request->getFile('imagem-artigo-edit');

		if($artigoImg != ""){

			if(file_exists($artigo[0]['img_artigo'])){
				$excluirFile = unlink($artigo[0]['img_artigo']);
		
				if(!$excluirFile){
					$this->session->setFlashdata('save', $data);
					return redirect('painel-artigos');
				}
			}
			$newName = $artigoImg->getRandomName();
			$artigoImg->move('uploads',$newName);
			$artigoEdit['img_artigo'] =  'uploads/'.$artigoImg->getName();
		}

		$savedit = $this->model->editArtigo($id,$artigoEdit);

		if($savedit){
			$data['message'] = "Artigo alterado com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect('painel-artigos');
	}
}
