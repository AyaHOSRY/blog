<!doctype html>
<html lang="en">
 @include('layouts.head')
<body>
 @include('layouts.nav')
<!--changing in every page so.. -->
<div class="container">
 @include('layouts.messages')
 
 @yield('content')
</div>
 @include('layouts.footer')

</body>
</html>