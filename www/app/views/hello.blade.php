@section('content')

@if(Session::has('connections'))
	<pre>
		{{ print_r(Session::get('connections')) }}	
		
	{{ print_r(Session::get('connections2')) }}	
	</pre>
@endif

@stop

