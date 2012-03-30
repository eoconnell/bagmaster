<?php

namespace Fuel\Migrations;

class Create_members
{
	public function up()
	{
		\DBUtil::create_table('members', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'first' => array('constraint' => 50, 'type' => 'varchar'),
			'last' => array('constraint' => 50, 'type' => 'varchar'),
			'sex' => array('constraint' => 1, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('members');
	}
}