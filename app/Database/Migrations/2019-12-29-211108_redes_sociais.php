<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RedesSociais extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_rede_social'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'link_social'=> [
				'type'=> 'TEXT'
			],
			'nome_social'=> [
				'type'=> 'TEXT'
			],
			'icone_social'=>[
				'type'=>'TEXT'
			]
		]);

		$this->forge->addKey('id_rede_social',true);
		$created = $this->forge->createTable('redesSociais');

		if($created){
			echo 'Table redesSociais criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('redesSociais');

		if($drop){
			echo 'Table redesSociais deletado com sucesso !';
		}
	}
}
