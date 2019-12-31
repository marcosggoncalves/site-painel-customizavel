<?php namespace App\Controllers;
use App\Models\DepoimentosModel;
use App\Models\ServicosModel;
use App\Models\ArtigosModel;
use App\Models\PagesModel;
use App\Models\RedesModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
	public function __construct()
    {
		helper('url');

		$this->Artigos = new ArtigosModel();
		$this->Servicos = new ServicosModel();
		$this->Depoimentos = new DepoimentosModel();
		$this->pages = new PagesModel();
		$this->redes = new RedesModel();
	}
	public function index()
	{
		$pages = $this->pages->pages();
		
		$data = [
			'artigos'=> $this->Artigos->getArtigosRecentes(),
			'servicos'=> $this->Servicos->getServicos(),
			'depoimentos'=> $this->Depoimentos->getDepoimentos(),
			'site'=>$this->formatArray($pages),
			'redes'=>$this->redes->getRedesSocias(),
			'titulo' => 'Prados Soluções Digitais'
		];
		
		return view('home',$data);

	}
	public function view($slug)
	{
		$artigo = $this->Artigos->getArtigo(urldecode($slug));
		$pages = $this->pages->pages();

		if(count($artigo) == 0){
			return redirect()->to('/artigos');
		}

		$data = [
			'titulo'=>$artigo[0]['titulo'],
			'artigo'=>$artigo,
			'site'=>$this->formatArray($pages)
		];

		return view('artigo',$data);
	}
	public function formatArray($array){
		
		$site = [];
		  
		foreach ($array as $key => $page) {
			$site[$page['page']] = $page;			
		}
	 	return $site;
	}
	public function artigos(){
		$pages = $this->pages->pages();
		$pager = \Config\Services::pager();

		$data = [
			'artigos'=> $this->Artigos->paginate(6,'list'),
			'site'=>$this->formatArray($pages),
			'titulo' => 'Artigos publicados | Prados Soluções Digitais',
			'pager' => $this->Artigos->pager
		];
		
		return view('artigos',$data);
	}
}
