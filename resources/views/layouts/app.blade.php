<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> {{ config('sximo.cnf_appname')}} </title>

<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

<link href="{{ asset('sximo5/sximo.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/iCheck/skins/square/green.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/toast/css/jquery.toast.css')}}" rel="stylesheet">
<!-- Icon CSS -->   
<link href="{{ asset('sximo5/fonts/icomoon.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!--<link href="{{ asset('sximo5/css/colors.css')}}" rel="stylesheet"> -->

<!-- Sximo 5 Main CSS -->
<link href="{{ asset('sximo5/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/css/all-themes.css')}}" rel="stylesheet">

<!--<link href="{{ asset('sximo5/css/sximo.css')}}" rel="stylesheet"> -->


<script type="text/javascript" src="{{ asset('sximo5/sximo.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('sximo5/js/sximo.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo5/js/plugins/node-waves/waves.js') }}"></script>

<script type="text/javascript" src="{{ asset('sximo5/js/admin.js') }}"></script>


    <link href="{{ asset('js/pagination/simplePagination.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/pagination/jquery.simplePagination.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.doubleScroll.js') }}"></script>


<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>

</head>

<body class="theme-deep-purple ">
<div id="wrapper">

      <aside id="leftsidebar" class="sidebar">
         @include('layouts.sidebar')             
      </aside>

      <aside id="rightsidebar" class="right-sidebar">
         @include('layouts.rightbar')            
        </aside>   
  
        <section class="content">
           @include('layouts.header') 
          <div class="container-fluid">
            <div class="ajaxLoading"></div>
            @yield('content') 
          </div>  
        </section>  
        



   
<div class="modal fade" id="sximo-modal" tabindex="-1" role="dialog">
<div class="modal-dialog  ">
  <div class="modal-content">
    <div class="modal-header bg-default">
        
        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body" id="sximo-modal-content">

    </div>

  </div>
</div>
</div>

{{ SiteHelpers::showNotification() }} 
<script type="text/javascript">
jQuery(document).ready(function ($) {

   setInterval(function(){ 
     // var noteurl = $('.notif-value').attr('code'); 
        $.get('{{ url("home/load") }}',function(data){
          $('.notif-alert').html(data.total);
          var html = '';
          $.each( data.note, function( key, val ) {     
           html += '<li><a href="'+val.url+'"><div class="icon-circle bg-light-green"><i class="'+val.icon+'"></i></div><div class="menu-info"><h4>'+val.title+'</h4><p>'+val.text+'</p> <p><i class="material-icons">access_time</i>'+val.date+'</p> </div></a></li>' ;
            });
          $('#notification-menu').html(html); 
        });
              

    }, 60000); 
})


</script>

</body>
</html>
