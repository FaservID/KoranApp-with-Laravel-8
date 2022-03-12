<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:15:52 GMT -->
<head>
<title>Login Admin</title>


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Phoenixcoded">
<meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="Phoenixcoded">

<link rel="icon" href="{{ asset('foto/') }}/logo.png" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('template/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default')}}/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default')}}/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default')}}/assets/css/style.css">

<link rel="stylesheet" type="text/css" href="{{asset('template/default')}}/assets/css/color/color-1.css" id="color" />
</head>
<body class="fix-menu">
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<div class="login-card card-block auth-body">
    <form class="md-float-material" action="{{ route('login') }}" method="post">
        @csrf
    <div class="text-center">
        <h3 class="display-2">CV. AULIA MANDIRI</h3>
    </div>
    <div class="auth-box">
    <div class="row m-b-20">
    <div class="col-md-12">
    <h3 class="text-left txt-primary">Sign In</h3>
    </div>
    </div>
    <hr />
    @error('email')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>Email / Password salah</strong>
        </span>
    @enderror
    <div class="input-group">
        <input id="email" type="email" placeholder="Enter a Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="md-line">
        </span>
    </div>
    
    <div class="input-group">
        <input id="password" type="password" placeholder="Enter an Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    <span class="md-line"></span>
    </div>
    <div class="row m-t-25 text-left">
    <div class="col-sm-7 col-xs-12">
    <div class="checkbox-fade fade-in-primary">
    <label>
    <input type="checkbox" value="">
    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
    <span class="text-inverse">Remember me</span>
    </label>
    </div>
    </div>
    </div>
    <div class="row m-t-30">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
    </div>
    </div>
    <hr />
        <div class="text-center">
            <p class="txt-primary text-center f-w-600" style="color:rgb(46, 46, 46)">Create With Love 💗</p>
        </div>
    </div>
    </form>

</div>

</div>

</div>

</div>

</section>


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

<script type="text/javascript" src="{{asset('template/')}}/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="{{asset('template/')}}/bower_components/modernizr/modernizr.js"></script>
<script type="text/javascript" src="{{asset('template/')}}/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

<script type="text/javascript" src="{{asset('template/')}}/bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../bower_components/jquery-i18next/jquery-i18next.min.js"></script>

<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/script.js"></script>

<script type="text/javascript" src="{{asset('template/default/')}}/assets/js/common-pages.js"></script>
</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:15:56 GMT -->
</html>
