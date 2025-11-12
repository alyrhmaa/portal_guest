<!DOCTYPE html>
<html lang="en">

{{-- Start css ---}}
@include('layouts.guest.css')
{{-- End css --}}

<body class="@yield('body-class', 'index-page')">

{{-- Header --}}
@include('layouts.guest.header')
{{-- End Header --}}

{{-- Main content --}}
  <main id="main" style="margin-top: 100px;">
    @yield('content')
  </main>
{{-- End Main content --}}

{{-- Footer --}}
@include('layouts.guest.footer')
{{-- End Footer --}}

{{-- Start JS --}}
@include('layouts.guest.js')
{{-- End JS --}}
</body>
</html>xdgxdxgxg
