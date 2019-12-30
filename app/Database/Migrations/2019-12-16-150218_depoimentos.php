<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Depoimentos extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_depoimento'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'cliente_depoimento '=> [
				'type'=> 'VARCHAR',
				'constraint'=> '150'
			],
			'descricao_depoimento'=>[
				'type'=>'TEXT'
			]
		]);
		$this->forge->addField("created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addKey('id_depoimento',true);
		$created = $this->forge->createTable('depoimentos');

		if($created){
			echo 'Table depoimentos criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('depoimentos');

		if($drop){
			echo 'Table deletado com sucesso !';
		}
	}
}
