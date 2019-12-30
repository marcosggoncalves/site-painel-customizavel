<?php namespace App\Controllers;
use App\Models\DepoimentosModel;
use CodeIgniter\Controller;
class Depoimentos extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new DepoimentosModel();
    }
	public function index()
	{
		$data = [
			'depoimentos'=> $this->model->getDepoimentos(),
			'titulo' => 'Depoimentos - painelSite'
		];

		return view('depoimentoCadastrar',$data);
	}
	public function save()
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'cliente'  => 'required',
			'descrição'  => 'required',
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar depoimento !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-depoimentos');
		}else{

			$data = [
				'status'=>false,
				'message'=>'Não foi possivel salvar depoimento !'
			];
			
			$session = \Config\Services::session($config);

			$depoimento = [
				'descricao_depoimento'=>$this->request->getVar('descrição'),
				'cliente_depoimento'=> '<b>~</b>'.$this->request->getVar('cliente')
			];

			$save = $this->model->newDepoimento($depoimento);

			if($save){
				$data['message'] = "Depoimento salvo com sucesso !";
				$data['status'] = true;
			}
			$this->session->setFlashdata('save', $data);
			return redirect('painel-depoimentos');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir depoimento !'
		];

		$delete = $this->model->deleteDepoimento($id);
		
		if($delete){
			$data['status'] = true;
			$data['message'] = 'Depoimento deletado com sucesso !';
		}

		$this->session->setFlashdata('save', $data);
		return redirect('painel-depoimentos');
	}
	public function edit($id)
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'cliente-edit'  => 'required',
			'descrição-edit'  => 'required',
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar serviço !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect('painel-depoimentos');
		}

		$depoimentoEdit = [
			'descricao_depoimento'=>$this->request->getVar('descrição-edit'),
			'cliente_depoimento'=> $this->request->getVar('cliente-edit')
		];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar depoimento !'
		];

		$savedit = $this->model->editDepoimento($id,$depoimentoEdit);

		if($savedit){
			$data['message'] = "Depoimento alterado com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect('painel-depoimentos');
	}
}
