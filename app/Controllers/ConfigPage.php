<?php namespace App\Controllers;
use App\Models\ConfigPageModel;
use CodeIgniter\Controller;

class ConfigPage extends BaseController
{
	public function __construct()
    {
		helper('url');
		$this->model = new ConfigPageModel();
    }
    public function index()
    {
    
        $data = [
			'configSite'=> $this->model->getConfig(),
			'titulo' => 'Configurações gerais sites - painelSite',
        ];
        
		return view('pageConfig',$data);
    }
    public function alterarConfig(){
        
        $postData = $this->request->getVar();

        $data = [
            'status'=>true,
            'message'=>'Configurações alteradas com sucesso !'
        ];

        foreach($postData as $input => $update){
     
            $atualizarConfig = [
                'valueConfig' => $update
            ];  

            $atuliazarConfig = $this->model->editConfigPage($input,$atualizarConfig);

            if(!$atuliazarConfig){
                $data['message'] = 'Não foi possivel atualizar configurações da página, tente novamente !';
                $data['status'] = false;

                $this->session->setFlashdata('save', $data);
                return redirect('painel-configuracoes-gerais');
            }
        }

        $this->session->setFlashdata('save', $data);
        return redirect('painel');
    }
}