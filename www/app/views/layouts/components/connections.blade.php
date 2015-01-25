<div id="connections">
	@if(Session::has('connections'))
		<?php
		//Get all saved connections
		foreach(Session::get('connections') as $connection)
		{
			//Get Current Connection Array
			$connections = Session::get('connections');
			try{
			   	DB::connection($connection['name'])->getDatabaseName();
			   	$connected = true;		
			}catch(Exception $e){
				$connected = false;
				//Trigger Alert
				//echo $e->getMessage();
			}
			//Update Individual Connected Value
			$connections[$connection['name']]['connected'] = $connected;
			//submit Updated Value
			Session::put('connections', $connections);
		}
		?>
		@foreach(Session::get('connections') as $connection)
			<div class="connection @if($connection['connected'] === true) connected @else disconected @endif">
				<span>{{{ $connection['name'] }}}</span>
				<span>@if($connection['connected'] === true) <a href="{{ URL::route('SystemRemoveConnection') }}?remove={{{ $connection['name'] }}}">X</a> @else <a href="#">O</a> <a href="{{ URL::route('SystemRemoveConnection') }}?remove={{{ $connection['name'] }}}">X</a> @endif</span>
			</div>
		@endforeach
	@endif
	<div class="newConnection">
		<span><a href="?overlay=AddNewConnection">Add New Connection</a></span>
	</div>
</div>