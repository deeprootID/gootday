<!DOCTYPE html>
<html lang="en">

<head>
  @include('backEnd.includes.head')
  <title>@yield('page-title')</title>
  @yield('stylesheet')
</head>

<body>

    @yield('content')

    <!-- JS File -->
    @include('backEnd.includes.script')
    @yield('script')

</body>

</html>
