<?php
class ConnectionDetails extends Eloquent {

	/**
	 * The connection used by the model.
	 *
	 * @var string
	 */

	protected $connection = 'System';

	protected $primaryKey = 'EntityID';

	protected $table = 'Connection_Details';

	protected $fillable = array('entityID', 'host', 'database', 'user', 'password');
}
?>