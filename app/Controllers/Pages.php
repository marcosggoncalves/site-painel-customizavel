<?php namespace App\Controllers;
use App\Models\PagesModel;
use CodeIgniter\Controller;

class Pages extends BaseController
{
	public function __construct()
    {
		helper('url');
		$this->pages = new PagesModel();
    }
    public function personalizar()
    {
        $find = $this->request->getVar('page');
        $findTable = $this->pages->getPages($find);
        $data = [];

        if(count($findTable) === 0){
			$data['status'] = false;
            $data['message'] = 'Página não encontrada.';
            
            $this->session->setFlashdata('save', $data);
            return redirect('painel');
		}
    
        $data['titulo'] = 'Editar página';
        $data['pageInputs'] = $findTable;

        return view('pagesModificar',$data);
    }

    public function personalizarSave($id)
    {
        $page = [
            'title_page'=>$this->request->getVar('title_page'),
            'desc_page'=>$this->request->getVar('desc_page')
        ];

        $data = [
            'status'=>true,
            'message'=> 'Página foi atualizada !'
        ];
        
      
        $Img = $this->request->getFile('img_page');
        $ImgAntiga = $this->request->getVar('img_antiga');

		if($Img != ""){

			if(file_exists($ImgAntiga)){
				$excluirFile = unlink($ImgAntiga);
		
				if(!$excluirFile){
                    $data['message'] = 'Não foi possivel atualizar página, tente novamente !';
                    $data['status'] = false;
					$this->session->setFlashdata('save', $data);
					return redirect('painel-artigos');
				}
			}
			$newName = $Img->getRandomName();
			$Img->move('uploads',$newName);
			$page['img_page'] =  'uploads/'.$Img->getName();
		}

        $atuliazarPage = $this->pages->editPage($id,$page);

        if(!$atuliazarPage){
            $data['message'] = 'Não foi possivel atualizar página, tente novamente !';
            $data['status'] = false;
        }

        $this->session->setFlashdata('save', $data);
        return redirect('painel');
    }
}