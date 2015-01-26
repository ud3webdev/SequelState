<?php

class ConnectionsController extends BaseController {

	public function connections()
	{

		$this->layout->content = View::make('layouts.components.connections');
	}

	public function setNewConnection()
	{	
		$validator = Validator::make(Input::all(),
		array(
			'name'	=>	'required | max:35 | alpha_dash',
			'host'	=>	'required',
			'user'	=>	'required',
			)
		);
		if($validator->fails()){
			return Redirect::to('/?overlay=AddNewConnection')
				->withErrors($validator)
				->withInput()
				->with('global', 'Unable to add new connection. See the details below.');
		}else{
			//Grab Connection Details
			$connection = array(
				'name' 		=> Input::get('name'),
				'host' 		=> Input::get('host'),
				'database' 	=> Input::get('database'),
				'user'		=> Input::get('user'),
				'password'	=> Input::get('password'),
				'connected' => true
				);
			//Add connection
			ConnectionEntities::NewConnection($connection);
			//Save if selected
			if(Input::has('save'))
			{
				ConnectionEntities::SaveConnection($connection['name'], $connection['host'], $connection['database'], $connection['user'], $connection['password']);
			}
			return Redirect::route('dashboard');
		}
	}
	public function removeConnection()
	{	
		if(Input::has('remove')){
			$remove = Session::forget('connections.'.Input::get('remove').'');
			if($remove){
				return Redirect::route('dashboard')
					->with('global', 'Connection: '. Input::get('remove') .' removed sucessfuly.');
			}else{
				return Redirect::route('dashboard')
					->with('global', 'Error CC_1/removed failed');
			}
		}
	}

}
