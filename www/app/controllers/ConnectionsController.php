<?php

class ConnectionsController extends BaseController {


	public function setNewConnection()
	{	
		//Grab Connection Details
		$connection = array(
			'name' 		=> Input::get('name'),
			'host' 		=> Input::get('host'),
			'database' 	=> Input::get('database'),
			'user'		=> Input::get('user'),
			'password'	=> Input::get('password'),
			);
		if(Session::has('connections')){
			//Get Current Connections
			$connections = Session::get('connections');
			//Add new Connection
			$connections[Input::get('name')] = $connection;
			//Send New Connection
			Session::put('connections', $connections);
		}else{
			//Prepare connection for insertion
			$connections = array();
			//Add New Connection
			$connections[Input::get('name')] = $connection;
			//Send New Connection
			Session::put('connections', $connections);
		}
		
		return Redirect::route('dashboard');
	}

}