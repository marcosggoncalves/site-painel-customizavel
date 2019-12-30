<?php namespace App\Controllers;
use App\Models\RedesModel;
use CodeIgniter\Controller;

class Redes extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->model = new RedesModel();
    }
	public function index()
	{
		$data = [
			'redes'=> $this->model->getRedesSocias(),
			'titulo' => 'Redes Sociais - site institucional'
		];

		return view('redesSociaisCadastrar',$data);
	}
	public function save()
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'link'  => 'required',
            'nome'  => 'required',
            'icone'  => 'required',
		]);
		
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel salvar rede social !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect()->to('painel-rede-social');
		}else{

			$data = [
				'status'=>false,
				'message'=>'Não foi possivel salvar usuário !'
			];
			
			$session = \Config\Services::session($config);

			$rede = [
				'link_social'=>$this->request->getVar('link'),
                'nome_social'=> $this->request->getVar('nome'),
                'icone_social'=> $this->request->getVar('icone')
			];

			$save = $this->model->newRede($rede);

			if($save){
				$data['message'] = "Rede social cadastrada com sucesso !";
				$data['status'] = true;
			}
			$this->session->setFlashdata('save', $data);
			return redirect()->to('/painel-rede-social');
		}
	}
	public function delete()
	{
		$id = $this->request->getVar('id');
		$data = [
			'status'=>false,
			'message'=>'Não foi possivel excluir rede social!'
		];

		$delete = $this->model->deleteRede($id);
		
		if($delete){
			$data['status'] = true;
			$data['message'] = 'Rede social deletada com sucesso !';
		}

		$this->session->setFlashdata('save', $data);
		return redirect()->to('/painel-rede-social');
	}
	public function edit($id)
	{
		$validation = \Config\Services::validation();

		$validate = $this->validate([
			'link-edit'  => 'required',
            'nome-edit'  => 'required',
            'icone-edit'  => 'required',
		]);
		
		if(!$validate){
			$data = [
				'validate'=>$this->validator->listErrors(),
				'status'=>false,
				'message'=>'Não foi possivel alterar rede social !'
			];
	
			$this->session->setFlashdata('save', $data);
			return redirect()->to('/painel-rede-social');
		}

		$rede = [
            'link_social'=>$this->request->getVar('link-edit'),
            'nome_social'=> $this->request->getVar('nome-edit'),
            'icone_social'=> $this->request->getVar('icone-edit')
        ];

		$data = [
			'status'=>false,
			'message'=>'Não foi possivel alterar rede social !'
		];

		$savedit = $this->model->editRede($id,$rede);

		if($savedit){
			$data['message'] = "Rede social alterada com sucesso !";
			$data['status'] = true;
		}
		$this->session->setFlashdata('save', $data);
		return redirect()->to('/painel-rede-social');
	}
}
