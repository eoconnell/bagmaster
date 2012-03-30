<?php
class Model_Bag extends \Orm\Model
{
	protected static $_belongs_to = array('storage', 'member');
	
	protected static $_properties = array(
		'id',
		'make',
		'color',
		'member_id',
		'storage_id',
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
		$val->add_field('make', 'Make', 'required|max_length[20]');
		$val->add_field('color', 'Color', 'required|max_length[20]');
		$val->add_field('member_id', 'Member Id', 'required|valid_string[numeric]');
		$val->add_field('storage_id', 'Storage Id', 'required|valid_string[numeric]');

		return $val;
	}

}
