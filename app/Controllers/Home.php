<?php namespace App\Controllers;
use App\Models\DepoimentosModel;
use App\Models\ServicosModel;
use App\Models\ArtigosModel;
use App\Models\PagesModel;
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
	}
	public function index()
	{
		$pages = $this->pages->pages();
		
		$data = [
			'artigos'=> $this->Artigos->getArtigosRecentes(),
			'servicos'=> $this->Servicos->getServicos(),
			'depoimentos'=> $this->Depoimentos->getDepoimentos(),
			'site'=>$this->formatArray($pages),
			'titulo' => 'Site institucional'
		];
		
		return view('home',$data);

	}
	public function view($id)
	{
		$artigo = $this->Artigos->getArtigo($id);
		$pages = $this->pages->pages();

		if(count($artigo) == 0){
			return redirect('/');
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
			'artigos'=> $this->Artigos->paginate(12,'list'),
			'site'=>$this->formatArray($pages),
			'titulo' => 'Artigos publicados',
			'pager' => $this->Artigos->pager
		];
		
		return view('artigos',$data);
	}
}
