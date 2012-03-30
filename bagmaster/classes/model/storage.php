<?php
class Model_Storage extends \Orm\Model
{
	protected static $_has_many = array('bags');
	
	protected static $_properties = array(
		'id',
		'slot',
		'capacity',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('slot', 'Slot', 'required|max_length[10]');
		$val->add_field('capacity', 'Capacity', 'required|valid_string[numeric]|max_length[2]');

		return $val;
	}

	public static function max_capacity()
	{
		$result = DB::query('SELECT MAX(capacity) as max FROM storages LIMIT 1')->as_object()->execute();

		return $result[0]->max;
	}

}
