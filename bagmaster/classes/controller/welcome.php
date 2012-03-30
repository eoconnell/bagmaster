<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		/*
		SELECT s.name AS name, s.slot AS slot, m.first AS first, m.last AS last, m.sex AS sex FROM storage AS s LEFT JOIN bags AS b ON s.storage_id = b.storage_id LEFT JOIN members AS m ON m.member_id = b.member_id ORDER BY name, slot ASC 
		*/
		/*
		SELECT m.first AS first, m.last AS last, m.sex AS sex, s.name AS name FROM members AS m LEFT JOIN bags AS b ON m.member_id = b.member_id LEFT JOIN storage AS s ON b.storage_id = s.storage_id ORDER BY last, first ASC
		*/

		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		Debug::dump('Test');
		return Response::forge(ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
