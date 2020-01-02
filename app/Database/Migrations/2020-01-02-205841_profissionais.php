<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profissionais extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_profissionais'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'nome_profissional'=>[
				'type'=>'varchar',
				'constraint'=>300
			],
			'sobre_profissional'=>[
				'type'=>'varchar',
				'constraint'=>300
			],
			'curriculo_profissional'=>[
				'type'=>'text'
			]
		]);
	    
		$this->forge->addKey('id_profissionais',true);
		$created = $this->forge->createTable('profissionais');

		if($created){
			echo 'Table profissionais criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('profissionais');

		if($drop){
			echo 'Table configPage deletado com sucesso !';
		}
	}
}
