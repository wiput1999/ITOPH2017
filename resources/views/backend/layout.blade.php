<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend | IT Ladkrabang Open House 2017</title>
    <!--Bootstrap-->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/backend.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/simple-sidebar.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" href="{{URL('/favicon.ico')}}" type="image/x-icon"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    IT KMITL Openhouse
                </a>
            </li>
            <li>
                <a href="{{URL('/backend/dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="{{URL('/backend/register')}}">Register</a>
                <ul>
                    <a href="{{URL('/backend/register/common')}}"><li>Common</li></a>
                    <a href="{{URL('/backend/register/student')}}"><li>Student</li></a>
                    <a href="{{URL('/backend/register/school')}}"><li>School</li></a>
                </ul>
            </li>
            <li>
                <a href="#">Competition</a>
                <ul>
                    <a href="{{URL('/backend/competition/esport')}}"><li>E-Sport</li></a>
                    <a href="{{URL('/backend/competition/project')}}"><li>Project IT</li></a>
                    <a href="{{URL('/backend/competition/quiz')}}"><li>Quiz</li></a>
                    <a href="{{URL('/backend/competition/network')}}"><li>Network</li></a>
                    <a href="{{URL('/backend/competition/php')}}"><li>PHP</li></a>
                </ul>
            </li>
            <li>
                <a href="{{URL('/backend/logout')}}">Logout</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <span class="hamburger" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    var toggled = function() {
        if ($(window).width() >= 768) {
            hasClass = $("#wrapper").hasClass("toggled");
        } else {
            hasClass = !$("#wrapper").hasClass("toggled");
        }
        if (hasClass) {
            $("#menu-toggle i:first-child").removeClass("fa-times").addClass("fa-bars");
        } else {
            $("#menu-toggle i:first-child").removeClass("fa-bars").addClass("fa-times");
        }
    };

    $(document).ready(function () {
        toggled();
        $('[data-toggle="tooltip"]').tooltip();
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        toggled();
    });

    $(window).resize(function () {
        toggled();
    });
</script>
@yield('script')
</body>
</html>