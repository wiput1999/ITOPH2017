<!-- Static navbar -->
<nav id="menu" class="navbar-default org-color-bg">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" id="nav-btn" class="hamberger navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL('/')}}">
                <img width="100" src="{{URL('/assets/images/logo-sym.svg')}}" alt="">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL('/')}}">หน้าหลัก</a></li>
                <li><a href="{{URL('/schedule')}}">กำหนดการ</a></li>
                <li><a href="{{URL('/#section4')}}">การแข่งขัน</a></li>
                <li><a href="{{URL('/route')}}">การเดินทาง</a></li>
                <li><a href="{{URL('/contact')}}">ติดต่อ</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>