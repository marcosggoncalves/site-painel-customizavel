<?php namespace App\Controllers;
use App\Models\ServicosModel;
use CodeIgniter\Controller;

class Servicos extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new ServicosModel();
    }
	public function index()
	{
		$data = [
			'servicos'=> $this->model->getServicos(),
			'titulo' => 'Serviços - site institucional'
		];

		return view('servicosCadastrar',$data);
	}
	public function save()
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'titulo'  => 'required',
			'descrição'  => 'required',
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar serviço !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-servicos');
		}else{

			$data = [
				'status'=>false,
				'message'=>'Não foi possivel salvar serviço !'
			];
			
			$session = \Config\Services::session($config);

			$servico = [
				'descricao_servico'=>$this->request->getVar('descrição'),
				'titulo_servico'=> $this->request->getVar('titulo')
			];

			$save = $this->model->newServico($servico);

			if($save){
				$data['message'] = "Serviço salvo com sucesso !";
				$data['status'] = true;
			}
			$this->session->setFlashdata('save', $data);
			return redirect('painel-servicos');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');
		$artigo = $this->model->getServico($id);

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir serviço !'
		];

		$delete = $this->model->deleteServico($id);
		
		if($delete){
			$data['status'] = true;
			$data['message'] = 'Serviço deletado com sucesso !';
		}

		$this->session->setFlashdata('save', $data);
		return redirect('painel-servicos');
	}

	public function edit($id)
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'titulo-edit'  => 'required',
			'descrição-edit'  => 'required',
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar serviço !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-servicos');
		}

		$servicoEdit = [
			'descricao_servico'=>$this->request->getVar('descrição-edit'),
			'titulo_servico'=> $this->request->getVar('titulo-edit')
		];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar serviço !'
		];

		$savedit = $this->model->editServico($id,$servicoEdit);

		if($savedit){
			$data['message'] = "Serviço alterado com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect('painel-servicos');
	}
}
