<html>
<head>
	@include('site.header')
</head>
<body>
@include('site.navbar')

            @include('site.sidebar')
          
            @yield('content')
    
        @include('site.footer')
        @yield('script')
</body>
</html>
