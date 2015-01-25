<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
	<script src="/jquery-2.1.3.min.js"></script>
</head>
<body>
<!-- Connection Bar -->
@include('layouts.components.connections')
<!-- Overlays -->
@include('layouts.components.overlays')
@yield('content')
</body>
</html>