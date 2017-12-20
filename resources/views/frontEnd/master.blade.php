<!DOCTYPE html>
<html>
<head>
	@include('frontEnd.includes.head')
	@yield('stylesheet')
	@include('frontEnd.includes.script')
</head>
<body>
<!-- nav -->
@include('frontEnd.includes.nav')
<!-- //nav -->
@yield('content')
<!-- footer -->
@include('frontEnd.includes.footer')
<!-- //footer -->
@include('frontEnd.includes.signin')
@yield('script')
</body>
</html>
