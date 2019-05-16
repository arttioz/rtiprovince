<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ config('sximo.cnf_appname') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <!-- CSS Files -->
    <link href="{{ asset('frontend/default/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/default/style.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('sximo5/fonts/icomoon.css') }}" rel="stylesheet" />
    <link href="{{ asset('sximo5/fonts/awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project --> 
     <script src="{{ asset('frontend/default/js/app.js') }}"></script>
      



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <![endif]-->
  </head>
  <body class="index-page sidebar-collapse">

  <div id="header">
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top bg-white">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('') }}">
           {{ config('sximo.cnf_appname') }}
          </a>
        </div> 
         <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           @include('layouts.default.navigation')
        </div>
      </div>
    </nav>       
    <!-- End Navbar -->
  </div>  

    <!-- Main Content Begin Here -->
    <div id="main-content">
        @include($pages)
    </div>
    <!-- Main Content Begin Here -->


    <!-- Footer Section -->
    <footer>
      <!-- Container Starts -->
      <div class="container">
        <!-- Row Starts -->
        <div class="row section">
          <!-- Footer Widget Starts -->
          <div class="footer-widget col-md-3 col-xs-12 wow fadeIn">
            <h3 class="small-title">
              ติดต่อเรา
            </h3>
            <div class="col2">
              <table cellpadding="0" cellspacing="0" class="tb1" width="100%">
                <tbody>
                <tr>
                  <td class="d1"></td>
                  <td class="d2">
                    <h1>สำนักโรคไม่ติดต่อ<br>
                      กรมควบคุมโรค</h1>
                  </td>
                </tr>
                </tbody>
              </table>

              <div class="tb3">เลขที่ 88/21 อาคาร 10 ชั้น 5 ตึกกรมควบคุมโรค<br>
                ถนนติวานนท์ ตำบลตลาดขวัญ อำเภอเมือง จังหวัดนนทบุรี 11000</div>



            </div>
          </div><!-- Footer Widget Ends -->
          
          <!-- Footer Widget Starts -->
          <div class="footer-widget col-md-3 col-xs-12 wow fadeIn" data-wow-delay=".2s">
            <h3 class="small-title">
              โทรศัพท์
            </h3>
            <ul class="recent-tweets">
              <table cellpadding="0" cellspacing="0" class="tb2" width="100%">
                <tbody>
                <tr valign="top">
                  <td width="57%" class="item-current">
                    0 2590 3867, 0 2590 3889<br>
                    0 2590 3888, 0 2590 3869<br>
                    0 2590 3893, 0 2590 3887<br>
                    0 2590 3870, 0 2590 3892
                  </td>
                </tr>
                </tbody>
              </table>
              
              
            </ul>
          </div><!-- Footer Widget Ends -->

          <div class="footer-widget col-md-3 col-xs-12 wow fadeIn" data-wow-delay=".2s">
            <h3 class="small-title">
              โทรสาร
            </h3>
            <ul class="recent-tweets">
              <table cellpadding="0" cellspacing="0" class="tb2" width="100%">
                <tbody>
                <tr valign="top">
                  <td width="57%" class="item-current">
                    0 2590 3893
                  </td>
                </tr>
                </tbody>
              </table>


            </ul>
          </div><!-- Footer Widget Ends -->

      
    </footer>
    <!-- Footer Section End-->

    <!-- JavaScript & jQuery Plugins -->
    <!-- jQuery Load -->
    
    <script src="{{ asset('frontend/default/js/script.js') }}"></script>

  </body>
</html>