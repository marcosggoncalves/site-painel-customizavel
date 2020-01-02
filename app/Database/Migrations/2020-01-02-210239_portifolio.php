<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Portifolio extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_portifolio'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'titulo_portifolio'=>[
				'type'=>'varchar',
				'constraint'=>300
			],
			'sobre_portifolio'=>[
				'type'=>'varchar',
				'constraint'=>300
			],
			'img_portifolio'=>[
				'type'=>'text'
			],
			'id_profissional_port'=>[
				'type'=>'int',
				'constraint'=>5,
			]
		]);
		$this->forge->addForeignKey('id_profissional_port','profissionais','id_profissionais');
		$this->forge->addKey('id_portifolio',true);
		$created = $this->forge->createTable('portifolio');

		if($created){
			echo 'Table portifolio criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('portifolio');

		if($drop){
			echo 'Table portifolio deletado com sucesso !';
		}
	}
}
