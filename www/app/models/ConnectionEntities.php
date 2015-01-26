<?php
class ConnectionEntities extends Eloquent {

	/**
	 * The connection used by the model.
	 *
	 * @var string
	 */

	protected $connection = 'System';

	protected $table = 'Connection_Entities';

	protected $primaryKey = 'EntityID';

	protected $fillable = array('EntityID', 'name');

	//Adds new connection to system
	public static function NewConnection($connection)
	{
		if(Session::has('connections'))
		{
			//Get Current Connections
			$connections = Session::get('connections');
			//Add new Connection
			$connections[$connection['name']] = $connection;
			//Save New Connection
			Session::put('connections', $connections);
		}
		else
		{
			//Prepare new connection array
			$connections = array();
			//Add New Connection
			$connections[$connection['name']] = $connection;
			//Save New Connection
			Session::put('connections', $connections);
		}
	}

	//Saves connection within system for future use.
	public static function SaveConnection($name, $host, $database, $user, $password)
	{
		DB::beginTransaction();
		//Set the name for the connection
		$Entity = ConnectionEntities::create(array(
			'name' 	=> $name
			));
		//Save the details about the connection
		$ConDetials = ConnectionDetails::create(array(
			'entityID' 	=> $Entity->EntityID,
			'host'		=> $host,
			'database'	=> $database,
			'user'		=> $user,
			'password'	=> $password
			));
		DB::commit();
	}	


}
?>