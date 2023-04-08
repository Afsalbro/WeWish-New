<!DOCTYPE HTML>
<html>
@include('themelayouts.head')

<body class="landing is-preload">



    @if (Session::get('success'))
        <div class="alert alert-success alert-block">{{ Session::get('success') }}</div>
    @elseif(Session::get('error'))
        <div class="alert alert-danger alert-block">{{ Session::get('error') }}</div>
    @endif

    @php
    $msg = '';
    foreach ($errors->all() as $error){
        $msg .= '<li>'. $error .'</li>';
    }

    if(!empty($msg)){
        echo '<div class="alert alert-danger alert-block"><ul>'. $msg .'</ul></div>';
    }
    @endphp
    
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        @include('themelayouts.header')
        @yield('content')
        @include('themelayouts.footer')
    </div>
    @include('themelayouts.scripts')
</body>

</html>
