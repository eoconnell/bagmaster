<?php
class Model_Member extends \Orm\Model
{
	protected static $_has_many = array('bags');
	
	protected static $_properties = array(
		'id',
		'first',
		'last',
		'sex',
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
		$val->add_field('first', 'First', 'required|max_length[50]');
		$val->add_field('last', 'Last', 'required|max_length[50]');
		$val->add_field('sex', 'Sex', 'required|max_length[1]');

		return $val;
	}

}
