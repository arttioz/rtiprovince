<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{config('sximo.cnf_appname') }}</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="{{ asset('sximo5/sximo.min.css')}}" rel="stylesheet">
    <link href="{{ asset('sximo5/js/plugins/iCheck/skins/square/green.css')}}" rel="stylesheet">
    <link href="{{ asset('sximo5/js/plugins/toast/css/jquery.toast.css')}}" rel="stylesheet">


    <link href="{{ asset('sximo5/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Sximo 5 Main CSS -->
    <link href="{{ asset('sximo5/css/style.css')}}" rel="stylesheet">


<!--<link href="{{ asset('sximo5/css/sximo.css')}}" rel="stylesheet"> -->

    <script type="text/javascript" src="{{ asset('sximo5/sximo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sximo5/js/sximo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sximo5/js/plugins/toast/js/jquery.toast.js') }}"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>
    
  
    </head>
<body class="login-page theme-deep-purple">
     <div class="login-box">
        <div class="sbox">
            <div class="sbox-content">
                <div class="text-center" style="margin: 15px 0;">
                @if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')
                <img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" width="100" />
                @else
                <img src="{{ asset('uploads/logo.png')}}" alt="{{ config('sximo')['cnf_appname'] }}" width="100" />
                @endif
            </div>

            @yield('content') 
        </div>
        </div>
    </div>


</body> 
</html>