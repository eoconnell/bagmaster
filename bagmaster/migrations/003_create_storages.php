<?php

namespace Fuel\Migrations;

class Create_storages
{
	public function up()
	{
		\DBUtil::create_table('storages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'slot' => array('constraint' => 10, 'type' => 'varchar'),
			'capacity' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('storages');
	}
}