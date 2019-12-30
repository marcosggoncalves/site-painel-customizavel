<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_usuario'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'usuario'=> [
				'type'=> 'VARCHAR',
				'constraint'=> '100'
			],
			'email'=> [
				'type'=> 'VARCHAR',
				'constraint'=> '100'
			],
			'senha'=> [
				'type'=> 'VARCHAR',
				'constraint'=> '100'
			]
		]);
		$this->forge->addField("created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addKey('id_usuario',true);
		$created = $this->forge->createTable('usuarios');

		if($created){
			echo 'Table usuarios criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('usuarios');

		if($drop){
			echo 'Table usuários deletado com sucesso !';
		}
	}
}
