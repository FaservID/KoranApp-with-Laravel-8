<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:22:56 GMT -->
<head>
<title>Koran App | @yield('title')</title>


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Phoenixcoded">
<meta name="keywords" content="flat ui, admin , Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="Phoenixcoded">

<link rel="shortcut icon" href="{{ asset('foto/') }}/logo.png">


<link rel="stylesheet" type="text/css" href="{{asset('template/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/')}}/bower_components/animate.css/animate.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/pages/flag-icon/flag-icon.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/pages/menu-search/css/component.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/pages/notification/notification.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/')}}/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('template/')}}/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/bower_components/pnotify/dist/pnotify.css">
<link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/bower_components/pnotify/dist/pnotify.brighttheme.css">
<link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/bower_components/pnotify/dist/pnotify.buttons.css">
<link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/bower_components/pnotify/dist/pnotify.history.css">
<link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/bower_components/pnotify/dist/pnotify.mobile.css">
<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/pages/pnotify/notify.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/css/style.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/css/color/color-1.css" id="color" />
<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/css/linearicons.css">
<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/css/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/css/ionicons.css">
<link rel="stylesheet" type="text/css" href="{{asset('template/default/')}}/assets/css/jquery.mCustomScrollbar.css">

<link rel="stylesheet" href="{{asset('template/')}}/bower_components/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('template/')}}/bower_components/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script type="text/javascript" src="{{asset('template/')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/pages/advance-elements/select2-custom.js"></script>

<link rel="stylesheet" href="{{asset('template/')}}/bower_components/select2/dist/css/select2.min.css" />
</head>
<body>

<div class="theme-loader">
<div class="ball-scale">
<div></div>
</div>
</div>
<!-- CONTENT START -->

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('layouts.nav')
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="page-header-title">
                                    <h4>@yield('title')</h4>
                                </div>
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('home') }}">
                                                <i class="icofont icofont-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- ./CONTENT END -->


<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<script type="text/javascript" src="{{asset('template/')}}/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
{{-- <script type="text/javascript" src="{{asset('template/default/')}}/assets/js/bootstrap-growl.min.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/pages/notification/notification.js"></script> --}}
<script type="text/javascript" src="{{asset('template/')}}/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="{{asset('template/')}}/bower_components/modernizr/modernizr.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

<script type="text/javascript" src="{{asset('template/default/')}}/assets/pages/advance-elements/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="{{asset('template/')}}/bower_components/classie/classie.js"></script>

<script type="text/javascript" src="{{asset('template/')}}/bower_components/datedropper/datedropper.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template/default')}}/assets/pages/data-table/js/jszip.min.js"></script>
<script src="{{asset('template/default')}}/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="{{asset('template/default')}}/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="{{asset('template/')}}/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.desktop.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.buttons.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.confirm.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.callbacks.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.animate.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.history.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.mobile.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/pnotify/dist/pnotify.nonblock.js"></script>
<script type="text/javascript" src="{{asset('template/default')}}/assets/pages/pnotify/notify.js"></script>

<script src="{{asset('template/default/')}}/assets/pages/user-profile.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/script.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/pages/data-table/js/data-table-custom.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/pcoded.min.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/demo-12.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/jquery.quicksearch.js"></script>



  <!-- end of footer -->
  @include('sweetalert::alert')

{{-- <script src="{{asset('template/default/')}}/assets/pages/data-table/js/data-table-custom.js"></script> --}}
</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:22:56 GMT -->
</html>
