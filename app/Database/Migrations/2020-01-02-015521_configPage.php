<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConfigPage extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_config_page'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'label'=>[
				'type'=> 'VARCHAR',
				'constraint'=> '150'
			],
			'labelConfig'=>[
				'type'=> 'VARCHAR',
				'constraint'=> '150'
			],
			'valueConfig'=>[
				'type'=> 'VARCHAR',
				'constraint'=> '150'
			],
			'typeConfig'=>[
				'type'=> 'VARCHAR',
				'constraint'=> '150'
			]
		]);
		$this->forge->addKey('id_config_page',true);
		$created = $this->forge->createTable('configPage');

		if($created){
			echo 'Table configPage criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('configPage');

		if($drop){
			echo 'Table configPage deletado com sucesso !';
		}
	}
}
