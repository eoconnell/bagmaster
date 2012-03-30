<?php
class Controller_Admin_Bags extends Controller_Admin 
{

	public function action_index()
	{
		$data['bags'] = Model_Bag::find('all');
		$this->template->title = "Bags";
		$this->template->content = View::forge('admin/bags/index', $data);

	}

	public function action_view($id = null)
	{
		$data['bag'] = Model_Bag::find($id);
		$this->template->title = "Bag";
		$this->template->content = View::forge('admin/bags/view', $data);

	}

	public function action_create($id = null)
	{
		$view = View::forge('admin/bags/create');

		if (Input::method() == 'POST')
		{
			$val = Model_Bag::validate('create');
			
			if ($val->run())
			{
				$bag = Model_Bag::forge(array(
					'make' => Input::post('make'),
					'color' => Input::post('color'),
					'member_id' => Input::post('member_id'),
					'storage_id' => Input::post('storage_id'),
				));

				if ($bag and $bag->save())
				{
					Session::set_flash('success', 'Added bag #'.$bag->id.'.');

					Response::redirect('admin/bags');
				}

				else
				{
					Session::set_flash('error', 'Could not save bag.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$view->set_global('members', Arr::assoc_to_keyval(Model_Member::find('all'), 'id', 'last'));
		$view->set_global('storage', Arr::assoc_to_keyval(Model_Storage::find('all'), 'id', 'slot'));

		$this->template->title = "Bags";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin/bags/edit');
		
		$bag = Model_Bag::find($id);
		$val = Model_Bag::validate('edit');

		if ($val->run())
		{
			$bag->make = Input::post('make');
			$bag->color = Input::post('color');
			$bag->member_id = Input::post('member_id');
			$bag->storage_id = Input::post('storage_id');

			if ($bag->save())
			{
				Session::set_flash('success', 'Updated bag #' . $id);

				Response::redirect('admin/bags');
			}

			else
			{
				Session::set_flash('error', 'Could not update bag #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$bag->make = $val->validated('make');
				$bag->color = $val->validated('color');
				$bag->member_id = $val->validated('member_id');
				$bag->storage_id = $val->validated('storage_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('bag', $bag, false);
		}

		$view->set_global('members', Arr::assoc_to_keyval(Model_Member::find('all'), 'id', 'last'));
		$view->set_global('storage', Arr::assoc_to_keyval(Model_Storage::find('all'), 'id', 'slot'));

		$this->template->title = "Bags";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($bag = Model_Bag::find($id))
		{
			$bag->delete();

			Session::set_flash('success', 'Deleted bag #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete bag #'.$id);
		}

		Response::redirect('admin/bags');

	}


}