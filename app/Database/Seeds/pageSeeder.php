<?php namespace App\Database\Seeds;

class pageSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'title_page'=>'<h1>Titulo Banner</h1>',
                'desc_page'=>'<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium ipsum quod soluta magni illum laboriosam, enim odio incidunt omnis earum non, pariatur nihil architecto libero voluptate, molestiae corporis doloremque sit!</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium ipsum quod soluta magni illum laboriosam, enim odio incidunt omnis earum non, pariatur nihil architecto libero voluptate, molestiae corporis doloremque sit!</p>',
                'img_page'=>'/uploads/banner.png',
                'page'=>'Banner',
                'is_img_page'=>'true'
            ],
            [
                'title_page'=>'<h1>Nossos Serviços</h1>',
                'desc_page'=>'<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium ipsum quod soluta magni illum laboriosam, enim odio incidunt omnis earum non, pariatur nihil architecto libero voluptate, molestiae corporis doloremque sit!</p>',
                'img_page'=>'none',
                'page'=>'Serviços',
                'is_img_page'=>'false'
            ],
            [
                'title_page'=>'<h1>Depoimentos</h1>',
                'desc_page'=>'<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium ipsum quod soluta magni illum laboriosam, enim odio incidunt omnis earum non, pariatur nihil architecto libero voluptate, molestiae corporis doloremque sit!</p>',
                'img_page'=>'none',
                'page'=>'Depoimentos',
                'is_img_page'=>'false'
            ],
            [
                'title_page'=>'<h1>Artigos</h1>',
                'desc_page'=>'<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium ipsum quod soluta magni illum laboriosam, enim odio incidunt omnis earum non, pariatur nihil architecto libero voluptate, molestiae corporis doloremque sit!</p>',
                'img_page'=>'none',
                'page'=>'Artigos',
                'is_img_page'=>'false'
            ],
            [
                'title_page'=>'<h1>Fale Consco</h1>',
                'desc_page'=>'<p>Entre em contato conosco, teremos o maior prazer em lhe atender!</p>',
                'img_page'=>'none',
                'page'=>'Contato',
                'is_img_page'=>'false'
            ],
            [
                'title_page'=>'<h1>Profissionais</h1>',
                'desc_page'=>'<p>Conheça nossos profissionais, equipe totalmente treinada.</p>',
                'img_page'=>'none',
                'page'=>'Profissionais',
                'is_img_page'=>'false'
            ],
            [
                'title_page'=>'Imagem header',
                'desc_page'=>'Imagem header',
                'img_page'=>'/uploads/logo.png',
                'page'=>'Cabeçalho',
                'is_img_page'=>'true'
            ]
        ];

        $this->db->table('pages')->insertBatch($data);
    }
}
