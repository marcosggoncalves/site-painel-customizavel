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
			'titulo' => 'Artigos - painelSite',
			'autor'=>"Publicado por: {$this->session->get('login')['user'][0]['usuario']}  - {$this->session->get('login')['user'][0]['setor']} "
		];

		return view('artigosCadastrar',$data);
	}
	public function save()
	{

		$validation = \Config\Services::validation();


		$validate = $this->validate([
			'titulo'  => 'required',
			'previa'=>'required',
			'descrição'  => 'required',
			'palavras-chaves'=>'required',
			'autor'=>'required',
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
			
			$slug = url_title($this->request->getVar('titulo'),'-', TRUE);

			$artigo = [
				'img_artigo' => 'uploads/'.$artigoImg->getName(),
				'titulo' => $this->request->getVar('titulo'),
				'publicacao_artigo' => $this->request->getVar('descrição'),
				'previa_artigo'  => $this->request->getVar('previa'),
				'palavras_chaves_artigos' => $this->request->getVar('palavras-chaves'),
				'autor_artigo'=> $this->request->getVar('autor'),
				'slug'=> $slug
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
		$artigo = $this->model->getArtigoEdit($id);

		$validate = $this->validate([
			"titulo-edit"  => "required",
			"descrição-edit{$artigo[0]['id_artigo']}"  => "required",
			"previa-edit"=> "required",
			"palavras-chaves-edit"=>"required"
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

		
		$slug = url_title($this->request->getVar('titulo-edit'), '-', TRUE);

		$artigoEdit = [
			'titulo'  => $this->request->getVar('titulo-edit'),
			'publicacao_artigo'  => $this->request->getVar("descrição-edit{$artigo[0]['id_artigo']}"),
			'previa_artigo'  => $this->request->getVar('previa-edit'),
			'palavras_chaves_artigos' => $this->request->getVar('palavras-chaves-edit'),
			'slug'=>$slug
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
