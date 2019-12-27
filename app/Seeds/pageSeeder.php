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
                'title_page'=>'<h1>Fale Consco<h1>',
                'desc_page'=>'<p>Entre em contato conosco, teremos o maior prazer em lhe atender!</p>',
                'img_page'=>'none',
                'page'=>'Contato',
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

        for ($i=0; $i < count($data); $i++) { 
            $this->db->query("INSERT INTO pages (title_page, desc_page, img_page, page, is_img_page) VALUES(:title_page:, :desc_page:, :img_page:, :page:, :is_img_page:)",
                $data[$i]
            );
        }
        $this->db->table('pages')->insert($data);
    }
}