<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
	<script src="/jquery-2.1.3.min.js"></script>
	<script>
	// Connection Status
	(function($)
	{
	    $(document).ready(function()
	    {
	        $.ajaxSetup(
	        {
	            cache: false,
	            beforeSend: function() {
	                $('#content').hide();
	                $('#loading').show();
	            },
	            complete: function() {
	                $('#loading').hide();
	                $('#content').show();
	            },
	            success: function() {
	                $('#loading').hide();
	                $('#content').show();
	            }
	        });
	        var $container = $("#LoadConnections");
	        $container.load("/connections");
	        var refreshId = setInterval(function()
	        {
	            $container.load('/connections')');
	        }, 9000);
	    });
	})(jQuery);

</script>
</head>
<body>
<div id="LoadConnections">
	@include('layouts.components.connections')
</div>
@yield('content')
</body>
</html>