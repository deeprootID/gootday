<!DOCTYPE html>
<html>
<head>
	@include('frontEnd.includes.head')
	<title>@yield('page-title')</title>
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
