<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    {{-- <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> --}}
    <title>@yield('title')</title>

    @include('includes.head_links')

</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>NIT<span>SCS</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">

                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        @include('includes.admin_sidebar')
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                @yield('content')
                
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        @include('includes.footer')
        <!--footer end-->
    </section>

    @include('includes.footer_links')
</body>

</html>