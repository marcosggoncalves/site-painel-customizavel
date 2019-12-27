<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        $this->session = \Config\Services::session();
        
        $data = [
            'status'=>false,
            'message'=> 'Nenhuma sessão encontrada, por favor, acesse o painelSite.'
        ];

        if ($this->session->get('login')['logado'] != 1){
            $this->session->setFlashdata('save', $data);
            return redirect('entrar');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
