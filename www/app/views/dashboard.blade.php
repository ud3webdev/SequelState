@section('content')


@if(Session::has('connections'))
	<pre>
		{{ print_r(Session::get('connections')) }}		
	</pre>
@endif

@stop

