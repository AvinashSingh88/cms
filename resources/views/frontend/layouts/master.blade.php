<!DOCTYPE html>
<html lang="en">

    @include('frontend.includes.header');
    <body>
        @include('frontend.includes.nav');
        
        @yield('content')
        
        @include('frontend.includes.footer');

    </body>
</html>