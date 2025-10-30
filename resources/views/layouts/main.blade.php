<!DOCTYPE html>
<html lang="en">

{{-- Start css ---}}
@include('layouts.css')
{{-- End css --}}

<body class="@yield('body-class', 'index-page')">

{{-- Header --}}
@include('layouts.header')
{{-- End Header --}}

{{-- Main content --}}
  <main id="main" style="margin-top: 100px;">
    @yield('content')
  </main>
{{-- End Main content --}}

{{-- Footer --}}
@include('layouts.footer')
{{-- End Footer --}}

{{-- Start JS --}}
@include('layouts.js')
{{-- End JS --}}
</body>
</html>
