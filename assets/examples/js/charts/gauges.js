(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/charts/gauges', ['jquery', 'Site'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'), require('Site'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.chartsGauges = mod.exports;
  }
})(this, function (_jquery, _Site) {
  'use strict';

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  (0, _jquery2.default)(document).ready(function ($$$1) {
    (0, _Site.run)();
  });

  // Example Gauge Dynamic
  // ---------------------
  (0, _jquery2.default)(document).ready(function ($$$1) {
    var dynamicGauge = $$$1("#exampleDynamicGauge").data('gauge');
    var type=$(".dynamicchart").data('type');
     var mid=1;
     setInterval(function () {
        var data='fun=fetchgaugedata&mid='+mid;
        $.ajax({
            url:'controller.php',
           method:'post',
           data:data,
           success:function(msg)
           {
                var random = 0;
                var obj=JSON.parse(msg);
                
                switch(type)
                {
                    case 1:
                        random=obj['tem'];
                        break;
                        
                    case 2:
                        random=obj['hum'];
                        break;
                        
                    case 3:
                        random=obj['pm25'];
                        break;
                        
                    case 4:
                        random=obj['pm10'];
                        break;
                        
                
                }
                  var options = {
                   strokeColor: Config.colors("primary", 500)
                 };
                  if (random > 70) {
                    options.strokeColor = Config.colors("pink", 500);
                  } else if (random < 30) {
                    options.strokeColor = Config.colors("green", 500);
                  }
                //  random =(Math.random() * (100.00 - 0.0200) + 0.0200).toFixed(2);
                  $('#mygaugevalue').text(random);
                  dynamicGauge.setOptions(options).set(Math.round(random));
           }
        });
        
    }, 1500); 
   });

  // Example Donut Dynamic
  // ---------------------
 // (0, _jquery2.default)(document).ready(function ($$$1) {
   // var dynamicDonut = $$$1("#exampleDynamicDonut").data('donut');

   // setInterval(function () {
     // var random = Math.round(Math.random() * 1000);

      //var options = {
        //strokeColor: Config.colors("primary", 500)
     // };
     // if (random > 700) {
       // options.strokeColor = Config.colors("pink", 500);
      //} else if (random < 300) {
        //options.strokeColor = Config.colors("green", 500);
      //}

      //dynamicDonut.setOptions(options).set(random);
    //}, 1500);
  //});
});