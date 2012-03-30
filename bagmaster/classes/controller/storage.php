<?php

class Controller_Storage extends Controller_Base {
	
	public function action_index()
	{
		$view = View::forge('storage/list');

		// gets all bags for each slot
		$view->storages = Model_Storage::find('all', array(
			'order_by' => array('slot' => 'asc'),
			'related' => array(
				'bags' => array(
					'order_by' => array('id' => 'desc'),
					'related' => array(
						'member' => array(
							'order_by' => array('last' => 'asc'),
						),
					),
				),
			),
		));


		$this->template->title = 'Storage List';
		$this->template->content = $view;
	}
}