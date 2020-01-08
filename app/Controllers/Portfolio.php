<?php namespace App\Controllers;

use App\Models\ProfissionaisModel;
use App\Models\PortfolioModel;
use CodeIgniter\Controller;

class Portfolio extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new PortfolioModel();
		$this->profissionais = new ProfissionaisModel();
    }
	public function index()
	{
		$data = [
			'portfolios'=> $this->model->getPortfolios(),
			'profissionais'=> $this->profissionais->getProfissionais(),
			'titulo' => 'Trabalho | Portfólio - painelSite'
		];

		return view('portfolioCadastrar',$data);
	}
	public function save()
	{

		$validation = \Config\Services::validation();


		$validate = $this->validate([
			'titulo'  => 'required',
			'sobre'=>'required',
			'profissional'=>'required',
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
				'message'=>'Não foi possivel cadastrar Trabalho no portfólio !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-portfolios');
		}else{
			$Img = $this->request->getFile('imagem');
			$newName = $Img->getRandomName();
			$Img->move('uploads',$newName);
			
			$data = [
				'status'=>false,
				'message'=>'Não foi possivel cadastrar Trabalho no portfólio !'
			];
			
			$portfolio = [
				'img_portifolio' => 'uploads/'.$Img->getName(),
				'sobre_portifolio' => $this->request->getVar('sobre'),
				'titulo_portifolio' => $this->request->getVar('titulo'),
				'id_profissional_port' => $this->request->getVar('profissional'),
			];
			
			
			$save = $this->model->newPortfolio($portfolio);

			if($save){
				$data['message'] = "Trabalho no portfólio cadastrado com sucesso !";
				$data['status'] = true;
			}
			$this->session->setFlashdata('save', $data);
			return redirect('painel-portfolios');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');
		$portfolio = $this->model->getPortfolio($id);

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir imagem, no entanto o Trabalho no portfólio foi excluido !'
		];

		if(file_exists($portfolio[0]['img_portifolio'])){
			$excluirFile = unlink($portfolio[0]['img_portifolio']);
	
			if($excluirFile){
				$data['message'] = "Trabalho no portfólio excluido com sucesso !";
				$data['status'] = true;
			}
		}

		$this->model->deletePortfolio($id);
		$this->session->setFlashdata('save', $data);
		return redirect('painel-portfolios');
	}
	public function edit($id)
	{
		$portfolio = $this->model->getPortfolio($id);

		$validate = $this->validate([
			'titulo-edit'  => 'required',
			'sobre-edit'=>'required'
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel publicar Trabalho no portfólio !'
			];
			$this->session->setFlashdata('save', $data);
			return redirect('painel-portfolios');
		}

	
		$portfolioEdit = [
			'sobre_portifolio' => $this->request->getVar('sobre-edit'),
			'titulo_portifolio' => $this->request->getVar('titulo-edit')
		];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar trabalho no portfólio !'
		];

		$Img = $this->request->getFile('imagem-edit');

		if($Img != ""){

			if(file_exists($portfolio[0]['img_portifolio'])){
				$excluirFile = unlink($portfolio[0]['img_portifolio']);
		
				if(!$excluirFile){
					$this->session->setFlashdata('save', $data);
					return redirect('painel-portfolios');
				}
			}
			$newName = $Img->getRandomName();
			$Img->move('uploads',$newName);
			$portfolioEdit['img_portifolio'] =  'uploads/'.$Img->getName();
		}

		$savedit = $this->model->editPortfolio($id,$portfolioEdit);

		if($savedit){
			$data['message'] = "Trabalho no portfólio alterado com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect('painel-portfolios');
	}
}
