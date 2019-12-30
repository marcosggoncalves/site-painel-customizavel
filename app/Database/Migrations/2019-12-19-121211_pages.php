<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pages extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_page'=>[
				'type'=>'INT',
				'constraint'=>5,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'title_page'=> [
				'type'=> 'text',
				'null'=> true
			],
			'desc_page'=> [
				'type'=> 'text',
				'null'=> true
			],
			'img_page'=> [
				'type'=> 'text',
				'null'=> true
			],
			'page'=> [
				'type'=> 'text',
				'null'=> true
			],
			'is_img_page'=> [
				'type'=> 'text',
				'null'=> true
			],
		]);

		$this->forge->addKey('id_page',true);
		$created = $this->forge->createTable('pages');

		if($created){
			echo 'Table pages criado com sucesso !';
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$drop = $this->forge->dropTable('pages');

		if($drop){
			echo 'Table pages deletado com sucesso !';
		}
	}
}
