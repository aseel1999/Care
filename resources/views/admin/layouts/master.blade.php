@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="main-content">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
@yield('JS')
@include('admin.layouts.footer')