<?php namespace App\Controllers;

use App\Models\DepoimentosModel;
use App\Models\ServicosModel;
use App\Models\ArtigosModel;
use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class SitemapGenerator extends BaseController
{
	public function __construct()
    {
		helper('url');
		helper('form');

		$this->Artigos = new ArtigosModel();
	}
	public function index()
	{
       $data = [
		   'artigos'=> $this->Artigos->getArtigos()
	   ];
		echo view('sitemap',$data);
		return redirect()->to('sitemap.xml');
	}
}
