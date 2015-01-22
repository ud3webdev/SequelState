@section('content')
<form action="{{ URL::action('ConnectionsController@setNewConnection') }}" method="post">

<label>Name:</label><input type="text" name="name"><br>
<label>Host:</label><input type="text" name="host"><br>
<label>Database:</label><input type="text" name="database"><br>
<label>User:</label><input type="text" name="user"><br>
<label>Password:</label><input type="password" name="password"><br>

<input type="submit" value="Add Connection">
</form>

@if(Session::has('connections'))
	<pre>
		{{ print_r(Session::get('connections')) }}	
		<?php
			foreach(Session::get('connections') as $connection)
			{
				$data = DB::connection($connection['name'])->table('MCA')->select('id')->get();
				echo print_r($data);
			}
		?>
	
	</pre>
@endif

@stop

