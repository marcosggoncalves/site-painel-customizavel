<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artigos extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_artigo'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'img_artigo'=>[
				'type'=>'TEXT',
			],
			'titulo'=> [
				'type'=> 'VARCHAR',
				'constraint'=> '100'
			],
			'previa_artigo'=>[
				'type'=>'VARCHAR',
				'constraint'=>'200'
			],
			'publicacao_artigo'=>[
				'type'=>'TEXT'
			],
			'autor_artigo'=>[
				'type'=>'TEXT'
			],
			'palavras_chaves_artigos'=>[
				'type'=>'TEXT'
			],
			'slug'=>[
				'type'=>'TEXT'
			]
		]);
		$this->forge->addField("created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addKey('id_artigo',true);
		$created = $this->forge->createTable('artigos');

		if($created){
			echo 'Table artigos criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('artigos');

		if($drop){
			echo 'Table serviços deletado com sucesso !';
		}
	}
}
