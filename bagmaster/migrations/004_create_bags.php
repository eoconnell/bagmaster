<?php

namespace Fuel\Migrations;

class Create_bags
{
	public function up()
	{
		\DBUtil::create_table('bags', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'make' => array('constraint' => 20, 'type' => 'varchar'),
			'color' => array('constraint' => 20, 'type' => 'varchar'),
			'member_id' => array('constraint' => 11, 'type' => 'int'),
			'storage_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('bags');
	}
}