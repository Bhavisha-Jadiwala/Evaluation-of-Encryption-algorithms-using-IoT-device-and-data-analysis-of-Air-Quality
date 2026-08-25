<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    
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
    <link rel="stylesheet" href="global/vendor/gauge-js/gauge.css">

    <link rel="stylesheet" href="assets/examples/css/charts/flot.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>

    <!-- <script src="global/vendor/breakpoints/breakpoints.js"></script> -->
    <script>
  // Breakpoints();
</script>
</head>
<body>
    <div class="row text-center mt-0" style="top:-50px;">
        <div class="col-12">
            <h1>
                Air Quality Data of <?= $_GET['lat'].' - '.$_GET['long']; ?>
            </h1>
        </div>
    </div>
    <div class="continer-fluid">
        <div class="row ml-1 mr-1">
            <div class="col-md-3 mt-4">
                <canvas id="gauge-id1"></canvas>
                <h4 class="text-center" style="text-transform: uppercase;">temperature</h4>
            </div>            
            <div class="col-md-3 mt-4">
                <canvas id="gauge-id2"></canvas>
                <h4 class="text-center" style="text-transform: uppercase;">Humidity</h4>
            </div>            
            <div class="col-md-3 mt-4">
                <canvas id="gauge-id3"></canvas>
                <h4 class="text-center" style="text-transform: uppercase;">pm25</h4>
            </div>            
            <div class="col-md-3 mt-4">
                <canvas id="gauge-id4"></canvas>
                <h4 class="text-center" style="text-transform: uppercase;">pm10</h4>
            </div>            
        </div>
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="text-center">Last Week Record Of <?= $_GET['lat'].' - '.$_GET['long']; ?></h4>
        </div>
        <div class="col-md-11 m-4 align-center">              
            <div id="line-example"></div>
        </div>
    </div>
</div>  




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
<script src="global/vendor/switchery/switchery.js"></script>
<script src="global/vendor/intro-js/intro.js"></script>
<script src="global/vendor/screenfull/screenfull.js"></script>
<script src="global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="global/vendor/gauge-js/gauge.min.js"></script>

<script src="global/vendor/flot/jquery.flot.js"></script>
<script src="global/vendor/flot/jquery.flot.resize.js"></script>
<script src="global/vendor/flot/jquery.flot.time.js"></script>
<script src="global/vendor/flot/jquery.flot.stack.js"></script>
<script src="global/vendor/flot/jquery.flot.pie.js"></script>
<script src="global/vendor/flot/jquery.flot.selection.js"></script>

<!-- Scripts -->
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
<script src="global/js/Plugin/gauge.js"></script><em></em>
<script src="global/js/Plugin/donut.js"></script>

<!-- <script src="assets/examples/js/charts/gauges.js"></script> -->



<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.7/radial/gauge.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script type="text/javascript">
        $(function(){

            $.ajax({
                url:'controller.php',
                data:'fun=fetch_lastweekalldata&lat=<?= $_GET['lat']; ?>&long=<?= $_GET['long'] ?>',
                method:'post',
                success:function(msg)
                {
                    
                    var obj=JSON.parse(msg);
                    var d=[];
                    
                    for(var i=0;i<obj.length;i++)
                    {
                        var temp={};
                        temp.y=obj[i]['Timestamp'];
                    if (obj[i]['data1']!='')
                        temp.a=obj[i]['data1'];
                    if (obj[i]['data2']!='')
                        temp.b=obj[i]['data2'];
                    if (obj[i]['data3']!='')
                        temp.c=obj[i]['data3'];
                    if (obj[i]['data4']!='')
                        temp.d=obj[i]['data4'];
                        d.push(temp);
                    }
                    
                        Morris.Line({
                          element: 'line-example',
                          data: d,
                          xkey: 'y',
                          ykeys: ['a','b','c','d'],
                          labels: ['Temperature','Humidity','PM25','PM10']
                        }); 

                        
                }
            });

        });    
</script>
<script type="text/javascript">

    var gauge1 = new RadialGauge({
        renderTo: 'gauge-id1', // identifier of HTML canvas element or element itself
        width: 200,
        height: 200,
        units: '°C',
        title: false,
        value: 0,
        minValue: -10,
        maxValue: 100,
        majorTicks: ['-10','0','10','20','30','40','50','60','70','80','90','100'],
        minorTicks: 0,
        strokeTicks: false,
        highlights: [
        { from: -10, to: 0, color: 'rgba(255,0,0,.15)' },
        { from: 0, to: 50, color: 'rgba(0,255,0,.15)' },
        { from: 50, to: 100, color: 'rgba(255,0,0,.15)' }
        ],
        colorPlate: '#222',
        colorMajorTicks: '#f5f5f5',
        colorMinorTicks: '#ddd',
        colorTitle: '#fff',
        colorUnits: '#ccc',
        colorNumbers: '#eee',
        colorNeedleStart: 'rgba(240, 128, 128, 1)',
        colorNeedleEnd: 'rgba(255, 160, 122, .9)',
        valueBox: true,
        animationRule: 'bounce'
    });
    gauge1.draw();

    var gauge2 = new RadialGauge({
        renderTo: 'gauge-id2', // identifier of HTML canvas element or element itself
        width: 200,
        height: 200,
        units: '%',
        title: false,
        value: 0,
        minValue: 0,
        maxValue: '100',
        majorTicks: ['0','10','20','30','40','50','60','70','80','90','100'],
        minorTicks: 0,
        strokeTicks: false,
        highlights: [
        { from: -10, to: 0, color: 'rgba(255,0,0,.15)' },
        { from: 0, to: 50, color: 'rgba(0,255,0,.15)' },
        { from: 50, to: 100, color: 'rgba(255,0,0,.15)' }
        ],
        colorPlate: '#222',
        colorMajorTicks: '#f5f5f5',
        colorMinorTicks: '#ddd',
        colorTitle: '#fff',
        colorUnits: '#ccc',
        colorNumbers: '#eee',
        colorNeedleStart: 'rgba(240, 128, 128, 1)',
        colorNeedleEnd: 'rgba(255, 160, 122, .9)',
        valueBox: true,
        animationRule: 'bounce'
    });
    gauge2.draw();

    var gauge3 = new RadialGauge({
        renderTo: 'gauge-id3', // identifier of HTML canvas element or element itself
        width: 200,
        height: 200,
        units: 'ug/m3',
        title: false,
        value: 0,
        minValue: 0,
        maxValue: '1000',
        majorTicks: ['0','100','200','300','400','500','600','700','800','900','1000'],
        minorTicks: 0,
        strokeTicks: false,
        highlights: [
        { from: -10, to: 0, color: 'rgba(255,0,0,.15)' },
        { from: 0, to: 50, color: 'rgba(0,255,0,.15)' },
        { from: 50, to: 100, color: 'rgba(255,0,0,.15)' }
        ],
        colorPlate: '#222',
        colorMajorTicks: '#f5f5f5',
        colorMinorTicks: '#ddd',
        colorTitle: '#fff',
        colorUnits: '#ccc',
        colorNumbers: '#eee',
        colorNeedleStart: 'rgba(240, 128, 128, 1)',
        colorNeedleEnd: 'rgba(255, 160, 122, .9)',
        valueBox: true,
        animationRule: 'bounce'
    });
    gauge3.draw();

    var gauge4 = new RadialGauge({
        renderTo: 'gauge-id4', // identifier of HTML canvas element or element itself
        width: 200,
        height: 200,
        units: 'ug/m3',
        title: false,
        value: 0,
        minValue: 0,
        maxValue: '1000',
        majorTicks: ['0','100','200','300','400','500','600','700','800','900','1000'],
        minorTicks: 0,
        strokeTicks: false,
        highlights: [
        { from: -10, to: 0, color: 'rgba(255,0,0,.15)' },
        { from: 0, to: 50, color: 'rgba(0,255,0,.15)' },
        { from: 50, to: 100, color: 'rgba(255,0,0,.15)' }
        ],
        colorPlate: '#222',
        colorMajorTicks: '#f5f5f5',
        colorMinorTicks: '#ddd',
        colorTitle: '#fff',
        colorUnits: '#ccc',
        colorNumbers: '#eee',
        colorNeedleStart: 'rgba(240, 128, 128, 1)',
        colorNeedleEnd: 'rgba(255, 160, 122, .9)',
        valueBox: true,
        animationRule: 'bounce'
    });
    gauge4.draw();

    $(function(){
        
       

        var data='fun=fetchgaugedata&lat=<?= $_GET['lat'] ?>&long=<?= $_GET['long']; ?>';
            $.ajax({
                url:'controller.php',
                method:'post',
                data:data,
                success:function(msg)
                {
                    
                    var random = 0;
                    var obj=JSON.parse(msg);
                    gauge1.value=obj['temperature'];
                    gauge2.value=obj['hummidity'];
                    gauge3.value=obj['pm25'];
                    gauge4.value=obj['pm10'];
                    
                }
        });




        setInterval(function () {
            $.ajax({
                url:'controller.php',
                method:'post',
                data:data,
                success:function(msg)
                {
                    
                    var random = 0;
                    var obj=JSON.parse(msg);
                    gauge1.value=obj['temperature'];
                    gauge2.value=obj['hummidity'];
                    gauge3.value=obj['pm25'];
                    gauge4.value=obj['pm10'];
                }
        });

        }, 5000); 
    });
</script>


</body>
</html>
