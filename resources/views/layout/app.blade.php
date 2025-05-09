<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
 $setting=setting();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>
        {{$setting->title}} - {{isset($page_title)?$page_title:""}}
    </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('uploads/'.$setting->logo)}}">

    <link href="{{asset('/css/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/custom.css')}}" rel="stylesheet">
    @if(App::getlocale() == "fa")
    <style>
    body {
        direction: rtl;
    }

    * {
        text-align: right;
    }

    #main-wrapper[data-layout=vertical][data-sidebartype=full] .page-wrapper {
        margin-right: 240px !important;
        margin-left: 0;
    }
    </style>
    @endif


    @yield('internal_css')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{URL::to('admin/dashboard')}}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="{{asset('uploads/'.$setting->logo)}}" alt="homepage" width="120" />
                        </b>
                        <!--End Logo icon -->                        
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="d-flex">
                        <li class="ms-3"><a href="{{URL::to('change_language/en')}}">English</a></li>
                        <li class="ms-3"><a href="{{URL::to('change_language/fa')}}">فارسی</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3" onsubmit="return false">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="#" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="{{asset("uploads/".Auth::user()->photo)}}" alt="{{Auth::user()->name}}" width="36"
                                    class="img-circle"><span
                                    class="text-white font-medium">{{Auth::user()->name}}</span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link " href="{{Route('dashbaord')}}"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.dashboard')}} </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{URL::to('admin/posts')}}" aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.posts')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{Route('categories')}}"
                                aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.categories')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{Route('tags')}}"
                                aria-expanded="false">
                                <i class="fa fa-tag" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.tags')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{URL::to('admin/sliders')}}" aria-expanded="false">
                                <i class="fa fa-image" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.sliders')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item dropdown">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle"
                                href="#" data-bs-toggle="dropdown">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                {{__('labels.setting')}}
                                </a>
                                <span class="caret"></span>
                                <ul class="dropdown-menu" style="padding:15px">
                                    <li><a href="{{URL::to('admin/setting')}}">{{__('labels.setting')}}</a></li>
                                    <li style="margin-top:15px"><a href="{{URL::to('admin/setting/home')}}">{{__('labels.home_page_setting')}}</a></li>
                                </ul>
                         
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{URL::to('admin/profile')}}" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.profile')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <form class="sidebar-link waves-effect waves-dark sidebar-link" method="POST"
                                action="{{route('logout')}}" aria-expanded="false" onclick="this.submit()">
                                @csrf
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <span class="hide-menu">{{__('labels.logout')}}</span>
                            </form>
                        </li>




                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            @yield('breadcrumb')

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('mainContent')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> <?php echo date('Y')?> © powered By<a
                    href="https://www.watantech.com/">Watantech</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/app-style-switcher.js')}}"></script>

    <script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{asset('js/chartist.min.js')}}"></script>
    <script src="{{asset('js/chartist-plugin-tooltip.min.js')}}"></script>

    @yield('internal_javascript')
   <script>
    $(document).ready(function(){
        setTimeout(() => {
           $(".custom_alert").remove() 
        }, 3000);
    })
   </script>
</body>

</html>