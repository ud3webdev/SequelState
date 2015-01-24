<div id="connections">
	@if(Session::has('connections'))
		<?php
		foreach(Session::get('connections') as $connection)
		{
			
				try{
				   DB::connection($connection['name'])->getDatabaseName();
				   //Get Current Connection Array
					$connections = Session::get('connections');
					//Update Individual Connected Value
					$connections[$connection['name']]['connected'] = 1;
					//submit Updated Value
					Session::put('connections', $connections);
				}catch(Exception $e){
				   //Get Current Connection Array
					$connections = Session::get('connections');
					//Update Individual Connected Value
					$connections[$connection['name']]['connected'] = 0;
					//submit Updated Value
					Session::put('connections', $connections);
	
					//Trigger Alert
					//echo $e->getMessage();
				}
			
		}
		?>
		@foreach(Session::get('connections') as $connection)
			<div class="connection @if($connection['connected'] === 1) connected @else disconected @endif">
				<span>{{ $connection['name'] }}</span>
			</div>
		@endforeach
	@endif
	<div class="newConnection">
		<span>Add New Connection</span>
	</div>
</div>