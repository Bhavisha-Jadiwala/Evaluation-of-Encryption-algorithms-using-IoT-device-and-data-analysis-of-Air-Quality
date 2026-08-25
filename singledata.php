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
                <?php
                switch($_GET['type'])
                {
                    case 1:
                    echo 'Temperature of '.$_GET['lat'].' - '.$_GET['long'];
                    break;
                    
                    case 2:
                    echo 'Humidity of '.$_GET['pn'];
                    break;
                    
                    case 3:
                    echo 'PM25 of '.$_GET['pn'];
                    break;
                    
                    case 4:
                    echo 'PM10 of '.$_GET['pn'];
                    break;
                }
                ?> 
            </h1>
        </div>
    </div>
    <div class="continer">
        <div class="row ml-4">
            <div class="col-md-4 mt-4 dynamicchart" data-lat="<?= $_GET['lat']; ?>" data-long="<?= $_GET['long'] ?>"> 
                <canvas id="gauge-id"></canvas>
            </div>
            <div class="col-md-7">              
              <div id="line-example"></div>
              <canvas id="canvas"></canvas>
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
                data:'fun=fetch_lastweekdata&type=<?= $_GET['type'] ?>&lat=<?= $_GET['lat']; ?>&long=<?= $_GET['long'] ?>',
                method:'post',
                success:function(msg)
                {
				
                    var obj=JSON.parse(msg);
                    var d=[];
                    
                    for(var i=0;i<obj.length;i++)
                    {
                        var temp={};
                        
                        temp.y=obj[i]['Timestamp'];
                        temp.a=obj[i]['data'];
                        d.push(temp);
                    }
                    
                        Morris.Line({
                          element: 'line-example',
                          data: d,
                          xkey: 'y',
                          ykeys: ['a'],

                          labels: ['<?php
                            switch ($_GET['type']) {
                                case 1:
                                echo 'Temperature of '.$_GET['pn'];
                                break;
                                
                                case 2:
                                echo 'Humidity of '.$_GET['pn'];
                                break;
                                
                                case 3:
                                echo 'PM25 of '.$_GET['pn'];
                                break;
                                
                                case 4:
                                echo 'PM10 of '.$_GET['pn'];
                                break;         
                            }
                            ?>']
                        }); 

                        
                }
            });

        });    
</script>
<script type="text/javascript">

    var gauge = new RadialGauge({
        renderTo: 'gauge-id', // identifier of HTML canvas element or element itself
        width: 200,
        height: 200,
        units: '<?php
        switch ($_GET['type']) {
            case '1':
                echo '°C';    
                break;
            
            case '2':
                echo '%';
                break;

            case '3':
                echo 'ug/m3';
                break;

            case '4':
                echo 'ug/m3';
                break;            
        }
        ?>',
        title: false,
        value: 0,
        minValue: <?php
        switch ($_GET['type']) {
            case 1:
                echo -10;    
                break;
            
            case 2:
                echo 0;
                break;

            case 3:
                echo 0;
                break;

            case 4:
                echo 0;
                break;            
        }
        ?>,
        maxValue: <?php
        switch ($_GET['type']) {
            case 1:
                echo '100';    
                break;
            
            case 2:
                echo '100';
                break;

            case 3:
                echo '1000';
                break;

            case 4:
                echo '1000';
                break;            
        }
        ?>,
        majorTicks: 
        <?php
        switch ($_GET['type']) {
            case '1':
                echo "['-10','0','10','20','30','40','50','60','70','80','90','100']";    
                break;
            
            case '2':
                echo "['0','10','20','30','40','50','60','70','80','90','100']";
                break;

            case '3':
                echo "['0','100','200','300','400','500','600','700','800','900','1000']";
                break;

            case '4':
                echo "['0','100','200','300','400','500','600','700','800','900','1000']";
                break;            
        }
        ?>
        ,
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


    // draw initially
    gauge.draw();
    $(function(){
        
        
        var data='fun=fetchgaugedata&lat=<?= $_GET['lat'] ?>&long=<?= $_GET['long'] ?>';
		
            $.ajax({
                url:'controller.php',
                method:'post',
                data:data,
                success:function(msg)
                {
                    
                    var random = 0;
                    var obj=JSON.parse(msg);
                    switch(<?= $_GET['type'] ?>)
                    {
                        case 1:
                        random=obj['temperature'];
                        break;
                        
                        case 2:
                        random=obj['hummidity'];
                        break;
                        
                        case 3:
                        random=obj['pm25'];
                        break;
                        
                        case 4:
                        random=obj['pm10'];
                        break;
                        
                    }
                    gauge.value=random;
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
                    switch(<?= $_GET['type'] ?>)
                    {
                        case 1:
                        random=obj['temperature'];
                        break;
                        
                        case 2:
                        random=obj['hummidity'];
                        break;
                        
                        case 3:
                        random=obj['pm25'];
                        break;
                        
                        case 4:
                        random=obj['pm10'];
                        break;
                        
                    }
                    gauge.value=random;
                }
        });

        }, 5000); 
    });
</script>


</body>
</html>
