<!DOCTYPE HTML>
<html>
@include('themelayouts.head')

<body class="landing is-preload">
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        @include('themelayouts.header')
        @yield('content')
        @include('themelayouts.footer')
    </div>
    @include('themelayouts.scripts')
</body>

</html>
