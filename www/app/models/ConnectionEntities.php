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