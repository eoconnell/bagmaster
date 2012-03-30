<?php
class Controller_Admin_Storages extends Controller_Admin 
{

	public function action_index()
	{
		$data['storages'] = Model_Storage::find('all');
		$this->template->title = "Storage Slots";
		$this->template->content = View::forge('admin/storages/index', $data);

	}

	public function action_view($id = null)
	{
		$data['storage'] = Model_Storage::find($id);

		$this->template->title = "Storage Slot";
		$this->template->content = View::forge('admin/storages/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Storage::validate('create');
			
			if ($val->run())
			{
				$storage = Model_Storage::forge(array(
					'slot' => Input::post('slot'),
					'capacity' => Input::post('capacity'),
				));

				if ($storage and $storage->save())
				{
					Session::set_flash('success', 'Added storage #'.$storage->id.'.');

					Response::redirect('admin/storages');
				}

				else
				{
					Session::set_flash('error', 'Could not save storage.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Storage Slots";
		$this->template->content = View::forge('admin/storages/create');

	}

	public function action_edit($id = null)
	{
		$storage = Model_Storage::find($id);
		$val = Model_Storage::validate('edit');

		if ($val->run())
		{
			$storage->slot = Input::post('slot');
			$storage->capacity = Input::post('capacity');

			if ($storage->save())
			{
				Session::set_flash('success', 'Updated storage #' . $id);

				Response::redirect('admin/storages');
			}

			else
			{
				Session::set_flash('error', 'Could not update storage #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$storage->slot = $val->validated('slot');
				$storage->capacity = $val->validated('capacity');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('storage', $storage, false);
		}

		$this->template->title = "Storage Slots";
		$this->template->content = View::forge('admin/storages/edit');

	}

	public function action_delete($id = null)
	{
		if ($storage = Model_Storage::find($id))
		{
			$storage->delete();

			Session::set_flash('success', 'Deleted storage #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete storage #'.$id);
		}

		Response::redirect('admin/storages');

	}


}