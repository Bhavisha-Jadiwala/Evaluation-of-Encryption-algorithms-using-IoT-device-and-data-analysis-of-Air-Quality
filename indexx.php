<?php
if(!isset($_COOKIE['en']) || empty($_COOKIE['en']))
{
	header('Location: index.php');
}
?><!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <script>

    function initMap() {
      const myLatLng = { lat: 51.5074, lng: 0.1278 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: myLatLng,
        gestureHandling: 'greedy',
        disableDefaultUI: true,
      });
      var data='fun=fetchmarker';
      $.ajax({
       url:'controller.php',
       method:'post',
       data:data,
       success:function(msg)
       {
		   
        var obj=JSON.parse(msg);
        for(var i=0;i<obj.length;i++)
        {
          
          var myLatLng1 = { lat: parseFloat(obj[i]['Lat']), lng: parseFloat(obj[i]['Long']) };

          var marker=new google.maps.Marker({
            position: myLatLng1,
            map,
            title: obj[i]['id']
            
          });
          google.maps.event.addListener(marker, "click", (function(marker) {
            return function(evt) {
              var content = marker.getTitle();
              
              $.ajax({
                url:'controller.php',
                data:'fun=fetchmarkerid&name='+content,
                method:'post',
                success:function(msg)
                {
					
                    var aa=JSON.parse(msg);
                    $('#single_marker_address').text(content);
                    $('.temperature').attr('href',"singledata.php?type=1&lat="+aa['Lat']+"&long="+aa['Long']);
                    $('.Humidity').attr('href',"singledata.php?type=2&lat="+aa['Lat']+"&long="+aa['Long']);
                    $('.pm25').attr('href',"singledata.php?type=3&lat="+aa['Lat']+"&long="+aa['Long']);
                    $('.pm10').attr('href',"singledata.php?type=4&lat="+aa['Lat']+"&long="+aa['Long']);
                    $('.alldata').attr('href',"alldata.php?lat="+aa['Lat']+"&long="+aa['Long']);
                    $('.downloaddata').attr('href',"pdf/report1.php?lat="+aa['Lat']+"&long="+aa['Long']);
                    $('.mysidediv').show();
                }
              })
            }
          })(marker));
        }
      } 
    });

    }

  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title> AQMS | Real Time Air Quality Monitoring</title>

  <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="assets/images/logo.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="global/css/bootstrap.min.css">
  <link rel="stylesheet" href="global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="assets/css/site.min.css">


  <!-- Plugins -->
  <link rel="stylesheet" href="global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="global/vendor/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="assets/examples/css/dashboard/v1.css">
  <link rel="stylesheet" href="global/vendor/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="assets/examples/css/advanced/lightbox.css">
  <link rel="stylesheet" href="global/vendor/gauge-js/gauge.css">



  <!-- Fonts -->
  <link rel="stylesheet" href="global/fonts/weather-icons/weather-icons.css">
  <link rel="stylesheet" href="global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
  <![endif]-->

    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="global/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
  <style type="text/css">
    body{
      overflow: hidden;
    }
  </style>
</head>
<body class="animsition dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center" data-toggle="gridmenu">
        <img class="navbar-brand-logo" src="assets/images/grey.png" title="Aqms">
        <span class="navbar-brand-text"> AQMS</span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
    </button>
  </div>

  <div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

        <li class="nav-item dropdown">
          <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
          data-animation="scale-up" role="button">
          <span class="avatar avatar-online">
            <img src="assets/images/download.png" alt="...">
          </span>
        </a>
        <div class="dropdown-menu" role="menu">
          <div class="dropdown-divider" role="presentation"></div>
          <a class="dropdown-item" href="index.php" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
        </div>
      </li>
    </ul>
    <!-- End Navbar Toolbar Right -->
  </div>

  <!-- End Navbar Collapse -->

  <!-- Site Navbar Seach -->

  <!-- End Site Navbar Seach -->
</div>
</nav>   


<!-- Page -->



<!-- Widget Statistic -->
<div class="card card-shadow" id="widgetStatistic">
  <div class="card-block p-0">
    <div class="row no-space h-full" data-plugin="matchHeight">
      <div class="col-12">
        <div id="map" style="height: 100%;"></div>
        <div class="row mysidediv" style="display:none; position: absolute; z-index:999; top:5%; border-radius: 10px; background-color: #FFFFFF; width: 300px; margin-left: 20px;">
          <div class="col-12 pl-30 pt-30">
                
              <button onclick="$('.mysidediv').toggle();" style="border:none; background-color: inherit; float: right;"><h4><i class="icon wb-close"></i></h4></button>  

              <h4><i class="icon wb-map blue-grey-400 mr-10" aria-hidden="true"></i>&nbsp;&nbsp;<span id="single_marker_address"></span></h4>

            <div class="example example-buttons">
              <div class="example-wrap" >
                <ul class="list-unstyled mt-20"><li>    
                  <div class="example example-buttons">
                    <a class="popup-youtube btn btn-primary btn-outline temperature" href="singledata.php?type=1">Temperature</a>
                  </div>

                </li>
                <li> 
                  <div class="example example-buttons">
                    <a class="popup-youtube btn btn-primary btn-outline Humidity" href="singledata.php?type=2">Humidity</a>
                  </div>

                </li>
                <li> 
                  <div class="example example-buttons">
                    <a class="popup-youtube btn btn-primary btn-outline pm25" href="singledata.php?type=3">PM 2.5</a>
                  </div>

                </li>
                <li> 
                  <div class="example example-buttons">
                    <a class="popup-youtube btn btn-primary btn-outline pm10" href="singledata.php?type=4">PM 10</a>
                  </div>

                </li>
                <li> 
                  <div class="example example-buttons">
                    <a class="popup-youtube btn btn-primary btn-outline alldata" href="alldata.php">All</a>
                  </div>  
                </li>

                <li> 
                  <div class="example example-buttons">
                    <a class="btn btn-primary btn-outline downloaddata" target="_blank" href="pdf/report1.php">Download Last 1 Month Data</a>
                  </div>  
                </li>
              </ul>
            </div>  
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
</div>





<!-- End Page -->

<footer style="  height: 44px;
padding: 10px 30px;
background-color: #fff;
border-top: 1px solid #e0e0e0;
box-shadow: inset 0 0 44px rgb(0 0 0 / 2%)"
>
<div class="site-footer-legal">© 2021 | <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Bhavisha Jadiwala</a></div>
<div class="site-footer-right">
  by <a href="https://themeforest.net/user/creation-studio">UNIVERSITY OF PORTSMOUTH</a>
</div>
</footer>
<!-- End Widget Statistic -->




<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClyV9siijWIO857x7Cw8MiNmCUDJKin4w&callback=initMap&libraries=&v=weekly"
async
></script>


<!-- Core  -->
<script src="global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="global/vendor/jquery/jquery.js"></script>
<script src="global/vendor/popper-js/umd/popper.min.js"></script>
<script src="global/vendor/bootstrap/bootstrap.js"></script>
<script src="global/vendor/animsition/animsition.js"></script>
<script src="global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="global/vendor/asscrollable/jquery-asScrollable.js"></script>
<script src="global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

<!-- Plugins -->
    <!-- <script src="global/vendor/switchery/switchery.js"></script>
    <script src="global/vendor/intro-js/intro.js"></script>
    <script src="global/vendor/screenfull/screenfull.js"></script>
    <script src="global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="global/vendor/skycons/skycons.js"></script>
        
        <script src="global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
        <script src="global/vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
        <script src="global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js"></script>
        <script src="global/vendor/matchheight/jquery.matchHeight-min.js"></script>
        <script src="global/vendor/gmaps/gmaps.js"></script>
        <script src="global/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="global/vendor/gauge-js/gauge.min.js"></script> -->

        <!-- Scripts -->
        <script src="global/vendor/chartist/chartist.min.js"></script>
        <script src="global/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="assets/js/Section/Menubar.js"></script>
        <script src="global/js/Component.js"></script>
        <script src="global/js/Plugin.js"></script>
        <script src="global/js/Base.js"></script>
        <script src="global/js/Config.js"></script>

        <script src="assets/js/Section/Menubar.js"></script>
        <script src="assets/js/Section/GridMenu.js"></script>
        <script src="assets/js/Section/Sidebar.js"></script>
        <script src="assets/js/Section/PageAside.js"></script>
        <script src="assets/js/Plugin/menu.js"></script>

        <script src="global/js/config/colors.js"></script>
        <script src="assets/js/config/tour.js"></script>
        <script>Config.set('assets', 'assets');</script>
        <!-- Page -->
        <script src="assets/js/Site.js"></script>
        <script src="global/js/Plugin/asscrollable.js"></script>
        <script src="global/js/Plugin/slidepanel.js"></script>
        <script src="global/js/Plugin/switchery.js"></script>
        <script src="global/js/Plugin/matchheight.js"></script>
        <script src="global/js/Plugin/jvectormap.js"></script>
        <script src="assets/examples/js/dashboard/v1.js"></script>
        <script src="global/js/Plugin/gmaps.js"></script>
        <script src="assets/examples/js/advanced/maps-google.js"></script>

        <script src="global/js/Plugin/magnific-popup.js"></script>

        <script src="assets/examples/js/advanced/lightbox.js"></script>
        <script src="global/js/Plugin/gauge.js"></script>
        <script src="global/js/Plugin/donut.js"></script>

        
      </body>
      </html>
