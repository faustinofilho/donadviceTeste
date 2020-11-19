<!DOCTYPE html> 
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <title>App - @yield('title')</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="description" content="Neon Admin Panel" />
      <meta name="author" content="Laborator.co" />
      <link rel="icon" href="{{ url('/') }}/assets/assets/images/favicon.ico">
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141030632-1"></script> <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', 'UA-141030632-1', {"groups":"laborator_analytics","link_attribution":true,"linker":{"accept_incoming":true,"domains":["laborator.co","kaliumtheme.com","oxygentheme.com","neontheme.com","themeforest.net","laborator.ticksy.com"]}});
      </script> 
      <title>Neon</title>
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" id="style-resource-1">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2">
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/css/bootstrap.css" id="style-resource-4">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/css/neon-core.css" id="style-resource-5">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/css/neon-theme.css" id="style-resource-6">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/css/neon-forms.css" id="style-resource-7">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/css/custom.css" id="style-resource-8">

      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/js/datatables/datatables.css" id="style-resource-1">


      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/js/select2/select2-bootstrap.css" id="style-resource-1">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/js/select2/select2.css" id="style-resource-2">

      <script src="{{ url('/') }}/assets/assets/js/jquery-1.11.3.min.js"></script> <!--[if lt IE 9]><script src="https://demo.neontheme.com/{{ url('/') }}/assets/assets/js/ie8-responsive-file-warning.js"></script><![endif]--> <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --> <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]--> <!-- TS1605698299: Neon - Responsive Admin Template created by Laborator --> 
   </head>
   <body class="page-body page-fade" data-url="https://demo.neontheme.com">
      <!-- TS160569829913117: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> 
      <div class="page-container">
         <!-- TS160569829910064: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> 
         <div class="sidebar-menu">
            <div class="sidebar-menu-inner">
               <header class="logo-env">
                  <!-- logo --> 
                  <div class="logo"> <a href="#"> <strong style="color: #fff; font-size: 20px;">Don Advice</strong> </a> </div>
                  <!-- logo collapse icon --> 
                  <div class="sidebar-collapse">
                     <a href="#" class="sidebar-collapse-icon">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition --> <i class="entypo-menu"></i> 
                     </a>
                  </div>
                  <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) --> 
                  <div class="sidebar-mobile-menu visible-xs">
                     <a href="#" class="with-animation">
                        <!-- add class "with-animation" to support animation --> <i class="entypo-menu"></i> 
                     </a>
                  </div>
               </header>
               <ul id="main-menu" class="main-menu">                  
                <li> <a href="{{ url('/categoria') }}"><span class="title">Categoria</span></a> </li>
                <li> <a href="{{ url('/fornecedor') }}" ><span class="title">Fornecedor</span></a> </li>
                <li> <a href="{{ url('/produto') }}" ><span class="title">Produto</span></a> </li>
               </ul>
            </div>
         </div>
         <div class="main-content">
            <!-- TS160569829919811: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> 
            <div class="row">
               <!-- Profile Info and Notifications --> 
               <div class="col-md-6 col-sm-8 clearfix">
                  <ul class="user-info pull-left pull-none-xsm">
                     <!-- Profile Info --> 
                     <li class="profile-info dropdown">
                        <!-- add class "pull-right" if you want to place this from right --> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                        {{ \Auth::user()->name }}
                        </a> 
                     </li>
                  </ul>
                 
               </div>
               <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                  <ul class="list-inline links-list pull-right">
                 
                     <li class="sep"></li>
                   
                     <li class="sep"></li>
                     <li> 
                        <a href="" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                           Sair <i class="entypo-logout right"></i> 
                        </a> 
                     </li>
                     <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                  </ul>
               </div>
            </div>
            <hr />
           
            <br /> 
                @yield('content') 
            <br /> 
            
            <footer class="main">
               <div class="pull-right"> 
                   <a href="" target="_blank"><strong></strong></a> </div>
               &copy; 2020 <strong>Neon</strong> Faustino Tavares de Santana Filho <a href="" target="_blank">Teste Fornecedor</a> 
            </footer>
         </div>
        
      </div>
     
  
      <!-- Imported styles on this page --> 
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/js/jvectormap/jquery-jvectormap-1.2.2.css" id="style-resource-1">
      <link rel="stylesheet" href="{{ url('/') }}/assets/assets/js/rickshaw/rickshaw.min.css" id="style-resource-2"> 
      <script src="{{ url('/') }}/assets/assets/js/gsap/TweenMax.min.js" id="script-resource-1"></script> 
      <script src="{{ url('/') }}/assets/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script> 
      <script src="{{ url('/') }}/assets/assets/js/bootstrap.js" id="script-resource-3"></script> 
      <script src="{{ url('/') }}/assets/assets/js/joinable.js" id="script-resource-4"></script> 
      <script src="{{ url('/') }}/assets/assets/js/resizeable.js" id="script-resource-5"></script> 
      <script src="{{ url('/') }}/assets/assets/js/neon-api.js" id="script-resource-6"></script> 
      <script src="{{ url('/') }}/assets/assets/js/cookies.min.js" id="script-resource-7"></script> 
      <script src="{{ url('/') }}/assets/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js" id="script-resource-8"></script> 
      <script src="{{ url('/') }}/assets/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js" id="script-resource-9"></script> 
      <script src="{{ url('/') }}/assets/assets/js/jquery.sparkline.min.js" id="script-resource-10"></script> 
      <script src="{{ url('/') }}/assets/assets/js/rickshaw/vendor/d3.v3.js" id="script-resource-11"></script> 
      <script src="{{ url('/') }}/assets/assets/js/rickshaw/rickshaw.min.js" id="script-resource-12"></script> 
      <script src="{{ url('/') }}/assets/assets/js/raphael-min.js" id="script-resource-13"></script> 
      <script src="{{ url('/') }}/assets/assets/js/morris.min.js" id="script-resource-14"></script> 
      <script src="{{ url('/') }}/assets/assets/js/toastr.js" id="script-resource-15"></script> 
      <script src="{{ url('/') }}/assets/assets/js/neon-chat.js" id="script-resource-16"></script> 
       <script src="{{ url('/') }}/assets/assets/js/neon-custom.js" id="script-resource-17"></script>  
      <script src="{{ url('/') }}/assets/assets/js/neon-demo.js" id="script-resource-18"></script> 
      <script src="{{ url('/') }}/assets/assets/js/neon-skins.js" id="script-resource-19"></script> 
      <script src="{{ url('/') }}/assets/assets/js/select2/select2.min.js" id="script-resource-8"></script> 
      <script src="{{ url('/') }}/assets/assets/js/datatables/datatables.js" id="script-resource-8"></script>
      <script>
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
      </script>
      @yield('scripts')
   </body>
</html>