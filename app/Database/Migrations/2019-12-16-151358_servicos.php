<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Servicos extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_servico'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'titulo_servico'=> [
				'type'=> 'VARCHAR',
				'constraint'=> '100'
			],
			'descricao_servico'=>[
				'type'=>'TEXT'
			],
			'icon_servico'=>[
				'type'=>'TEXT'
			]
		]);
		$this->forge->addField("created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addKey('id_servico',true);
		$created = $this->forge->createTable('servicos');

		if($created){
			echo 'Table serviços criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('servicos');

		if($drop){
			echo 'Table serviços deletado com sucesso !';
		}
	}
}
