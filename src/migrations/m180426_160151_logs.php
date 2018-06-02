<?php
namespace jakharbek\logs\migrations;

use yii\db\Migration;

class m180426_160151_logs extends Migration
{
	public function up()
	{
		$tableOptions = NULL;

		if( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable( '{{%logs}}', [
			'log_id'  => $this->primaryKey(),
			'message' => $this->text()
		], $tableOptions );
	}

	public function down()
	{
		$this->dropTable( '{{%logs}}' );
	}
}