<?php
$strPageTitle = QApplication::Translate('Almacen') . ' - ' . QApplication::Translate('Ver Materias Primas');
require(__CONFIGURATION__ . '/header.inc.php'); ?>

<?php $this->RenderBegin(); ?>
<!-- van en esta sección porque necesitamos que carguen antes que la página se haya cargado completamente -->
<!-- Plugins For This Page -->
<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/chartist-js/chartist.min.css">
<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/jvectormap/jquery-jvectormap.min.css">
<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.css">
<!-- Inline -->
<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/examples/css/dashboard/v1.css">


<?php 


$condicion = " and ( YEAR(FechaVenta)>={$this->selectYearIni} and YEAR(FechaVenta)<= {$this->selectYearFin} ) ";
//ingreso
$query1 = "select YEAR(FechaVenta) as year, MONTH(FechaVenta) as month , SUM(TotalVenta) as suma from venta where EstadoVenta >= 1 $condicion  GROUP BY YEAR(FechaVenta), MONTH(FechaVenta)";  
//ventas
$query2 = "select YEAR(FechaVenta) as year, MONTH(FechaVenta) as month , Count(IdVenta) as suma from venta where EstadoVenta >= 1 $condicion  GROUP BY YEAR(FechaVenta), MONTH(FechaVenta)";  

$arrayAllMeses[] = array(); 
$fechaInicio =  strtotime(date($this->selectYearIni.'/01/01'));
$fechaFin = strtotime(date($this->selectYearFin.'/12/31'));
for ($i = $fechaInicio; $i < $fechaFin +86400; $i+=86400) {
            $newstring = intval(date("Y", $i)).'|'.intval(date("m", $i));
             if(!isset($arrayAllMeses[$newstring. ''])){
                $arrayAllMeses[$newstring.''] =    array('Date' =>$newstring,
                                                        'Ingresos' => 0.0,
                                                        'Venta' => 0.0);
             }
}

$objDbResult1 = QApplication::$Database[1]->Query("$query1");
while (($report1 = $objDbResult1->FetchArray())) {
    if(isset($arrayAllMeses[$report1['year'].'|'.$report1['month']])){
        $arrayAllMeses[$report1['year'].'|'.$report1['month']]['Ingresos']= $report1['suma'];
    }
}

$objDbResult2 = QApplication::$Database[1]->Query("$query2");
while (($report2 = $objDbResult2->FetchArray())) {
    if(isset($arrayAllMeses[$report2['year'].'|'.$report2['month']])){
        $arrayAllMeses[$report2['year'].'|'.$report2['month']]['Venta']= $report2['suma'];
    }
}

//var_dump($arrayAllMeses);
$labelIngresos='';
$dataIngresos='';

$labelVenta='';
$dataVenta='';

$labelDiferencia='';

$j=1;

$sumaIngresos = 0.0;
$sumaVenta = 0;

foreach ($arrayAllMeses as $value) {
    
   if(isset($value['Date'])) {
    if(trim($labelIngresos)==''){
        $labelIngresos=$value['Date'];
        $dataIngresos=$value['Ingresos'];

        $labelVenta=$value['Date'];
        $dataVenta=$value['Venta'];
        $labelDiferencia=$j;
    }
    else{
        $labelIngresos.= " ," .$value['Date'];
        $dataIngresos.= " ," .$value['Ingresos'];

        $labelVenta.= " ," .$value['Date'];
        $dataVenta.= " ," .$value['Venta'];
        
          $labelDiferencia.=" ," .$j;
    }
    
    $sumaIngresos = $sumaIngresos + $value['Ingresos'];
    $sumaVenta = $sumaVenta + $value['Venta'];
    
  
    $j++;
   }
}















$condicion = " and ( FechaVenta >= (NOW() - INTERVAL 15 DAY) and FechaVenta<= now() ) ";
//ingreso
$query1 = "select YEAR(FechaVenta) as year, MONTH(FechaVenta) as month ,DAY(FechaVenta) as day , SUM(TotalVenta) as suma from venta where EstadoVenta >= 1 $condicion  GROUP BY YEAR(FechaVenta), MONTH(FechaVenta),DAY(FechaVenta)";  
//ventas
$query2 = "select YEAR(FechaVenta) as year, MONTH(FechaVenta) as month ,DAY(FechaVenta) as day , Count(IdVenta) as suma from venta where EstadoVenta >= 1 $condicion   GROUP BY YEAR(FechaVenta), MONTH(FechaVenta),DAY(FechaVenta)";  


$arrayAllDias[] = array(); 
$fechaInicio =  strtotime('today -15 days');
$fechaFin = strtotime('today');
for ($i = $fechaInicio; $i < $fechaFin +86400; $i+=86400) {
            $newstring = intval(date("Y", $i)).'|'.intval(date("m", $i)).'|'.intval(date("d",$i));
             if(!isset($arrayAllDias[$newstring. ''])){
                $arrayAllDias[$newstring.''] =    array('Date' =>$newstring,
                                                        'Ingresos' => 0.0,
                                                        'Venta' => 0.0);
             }
}
//var_dump($arrayAllDias);

$objDbResult1 = QApplication::$Database[1]->Query("$query1");
while (($report1 = $objDbResult1->FetchArray())) {
    if(isset($arrayAllDias[$report1['year'].'|'.$report1['month'].'|'.$report1['day']])){
        $arrayAllDias[$report1['year'].'|'.$report1['month'].'|'.$report1['day']]['Ingresos']= $report1['suma'];
    }
}

$objDbResult2 = QApplication::$Database[1]->Query("$query2");
while (($report2 = $objDbResult2->FetchArray())) {
    if(isset($arrayAllDias[$report2['year'].'|'.$report2['month'].'|'.$report2['day']])){
        $arrayAllDias[$report2['year'].'|'.$report2['month'].'|'.$report2['day']]['Venta']= $report2['suma'];
    }
}

$labelIngresosDias='';
$dataIngresosDias='';

$labelVentaDias='';
$dataVentaDias='';

$labelDiferenciaDias='';

$j=1;

$sumaIngresosDias = 0.0;
$sumaVentaDias = 0;

foreach ($arrayAllDias as $value) {
    
   if(isset($value['Date'])) {
    if(trim($labelIngresosDias)==''){
        $labelIngresosDias=$value['Date'];
        $dataIngresosDias=$value['Ingresos'];

        $labelVentaDias=$value['Date'];
        $dataVentaDias=$value['Venta'];
        $labelDiferenciaDias=$j;
    }
    else{
        $labelIngresosDias.= " ," .$value['Date'];
        $dataIngresosDias.= " ," .$value['Ingresos'];

        $labelVentaDias.= " ," .$value['Date'];
        $dataVentaDias.= " ," .$value['Venta'];
        
        $labelDiferenciaDias.=" ," .$j;
    }
    
    $sumaIngresosDias = $sumaIngresosDias + $value['Ingresos'];
    $sumaVentaDias = $sumaVentaDias + $value['Venta'];
  
  
    $j++;
   }
}




?>




<!-- Page -->
<div class="page">
    <div class="page-content padding-30 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">

    
            
            <div class="col-sm-12">
 <!-- Widget -->
 <div class="widget">
   <div class="widget-content padding-30 bg-cyan-800">
      
     <div class="pull-right vertical-align-middle">       
      <?php  $this->lstYear->Render(); ?>
     </div>
     <div class="counter counter-md counter-inverse text-left">
       <div class="counter-number-group">
         <span class="counter-number"></span>
         <span class="counter-number-related text-capitalize" style="font-size: 16px;">Ingresos | Ventas : <?php echo "S/". $sumaIngresos." | ".$sumaVenta; ?></span>
       </div>
     <!-- <div class="counter-label text-capitalize">S/2500</div> -->
       
       
     </div>
      
       
       
   </div>
 </div>
 <!-- End Widget -->
</div>
            
            
            
            
            
            <div class="col-xlg-12 col-md-12 col-sm-12 col-lg-12 "> <!-- <div class="col-xlg-4 col-md-12">-->
                <div class="row height-full">
                    <div class="col-xlg-6 col-md-6 col-sm-6 col-lg-6 ">  <!--      <div class="col-xlg-12 col-md-6" >   -->
                        <!-- Widget Linepoint -->
                        <div class="widget widget-shadow bg-blue-600 white" id="widgetLinepoint">
                            <div class="widget-content">
                                <div class="padding-top-25 padding-horizontal-30">
                                    <div class="row no-space">
                                        <div class="col-xs-6">
                                            <p>Ingresos</p>
                                            <p class="white">Graf. ingresos por mes.</p>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <p class="font-size-30 text-nowrap"><?php echo "S/". $sumaIngresos; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ct-chart height-150"></div>
                            </div>
                        </div>
                        <!-- End Widget Linepoint -->
                    </div>
                    <div class="col-xlg-6 col-md-6 col-sm-6 col-lg-6 ">  <!--      <div class="col-xlg-12 col-md-6" >   -->
                        <!-- Widget Sale Bar -->
                        <div class="widget widget-shadow bg-green-600   white" id="widgetSaleBar">
                            <div class="widget-content">
                                <div class="padding-top-25 padding-horizontal-30">
                                    <div class="row no-space">
                                        <div class="col-xs-6">
                                            <p>Ventas</p>
                                            <p class="white">Graf. ventas por mes. </p>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <p class="font-size-30 text-nowrap"> <?php echo $sumaVenta; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ct-chart height-150"></div>
                            </div>
                        </div>
                        <!-- End Widget Sale Bar -->
                    </div>
                </div>
            </div>

      

            
            
   <div class="col-xlg-12 col-md-12 col-sm-6 col-lg-12"> <!--<div class="col-xlg-6 col-md-12"> --> 
                <!-- Widget OVERALL VIEWS -->
                <div class="widget widget-shadow widget-responsive" id="widgetOverallViews">
                    <div class="widget-content padding-30">
                        <div class="row padding-bottom-30" style="height:calc(100% - 250px);">
                            <div class="col-xs-4">
                                <div class="counter counter-md text-left">
                                    <div class="counter-label">Grafica 15 ultimos dias</div>
                                    <div class="counter-label blue-grey-400">Ingresos y Ventas</div>
                                </div>
                            </div>
                           
                            
                        </div>
                        <div class="ct-chart line-chart height-500"></div>
                    </div>
                </div>
                <!-- End Widget OVERALL VIEWS -->
            </div>


            
      <!--      
     <div class="col-xlg-12 col-md-12 col-sm-6 col-lg-12">
                
                <div class="widget widget-shadow" id="widgetStatistic">
                    <div class="widget-content">
                        <div class="row no-space height-full" data-plugin="matchHeight">
                            <div class="col-sm-8 col-xs-12">
                                <div id="widgetJvmap" class="height-full"></div>
                            </div>
                            <div class="col-sm-4 col-xs-12 padding-30">
                                <div class="form-group">
                                    <div class="input-search input-search-dark">
                                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="" placeholder="Search...">
                                    </div>
                                </div>
                                <p class="font-size-20 blue-grey-700">Statistic</p>
                                <p class="blue-grey-400">Status: live</p>
                                <p>
                                    <i class="icon wb-map blue-grey-400 margin-right-10" aria-hidden="true"></i>
                                    <span>258 Countries, 4835 Cities</span>
                                </p>
                                <ul class="list-unstyled margin-top-20">
                                    <li>
                                        <p>VISITS</p>
                                        <div class="progress progress-xs margin-bottom-25">
                                            <div class="progress-bar progress-bar-info bg-blue-600" style="width: 70.3%" aria-valuemax="100"
                                                 aria-valuemin="0" aria-valuenow="70.3" role="progressbar">
                                                <span class="sr-only">70.3%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>TODAY</p>
                                        <div class="progress progress-xs margin-bottom-25">
                                            <div class="progress-bar progress-bar-info bg-green-600" style="width: 70.3%" aria-valuemax="100"
                                                 aria-valuemin="0" aria-valuenow="70.3" role="progressbar">
                                                <span class="sr-only">70.3%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>WEEK</p>
                                        <div class="progress progress-xs margin-bottom-0">
                                            <div class="progress-bar progress-bar-info bg-purple-600" style="width: 70.3%"
                                                 aria-valuemax="100" aria-valuemin="0" aria-valuenow="70.3"
                                                 role="progressbar">
                                                <span class="sr-only">70.3%</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
-->
        
        
        </div>
    </div>
</div>
<!-- End Page -->

<?php $this->RenderEnd(); ?>

<script>
    (function (document, window, $) {
        'use strict';
        //$('#activeReport').addClass('active open');
        $('#activeDashboardAdmin').addClass('active');
    })(document, window, jQuery);
</script>
<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>


<!-- van en esta sección porque asi cargaran después que la página se haya cargado completamente -->
<!-- Plugins For This Page -->
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/skycons/skycons.js"></script>
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/chartist-js/chartist.min.js"></script>
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/jvectormap/jquery-jvectormap.min.js"></script>
<!--<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js"></script>-->
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/jvectormap/maps/jquery-jvectormap-us-aea.js"></script>
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/vendor/matchheight/jquery.matchHeight-min.js"></script>

<!-- Scripts For This Page -->
<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/js/components/matchheight.min.js"></script>
<!-- <script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/js/components/jvectormap.min.js"></script> -->
<!--<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/examples/js/dashboard/v1.js"></script> -->

<script src="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/js/plugins/chartist-plugin-legend.js"></script>

<style>
    .ct-legend {
           position: relative;
           z-index: 10;
           list-style: none;
           text-align: center;
       }
       .ct-legend li {
           position: relative;
           padding-left: 23px;
           margin-right: 10px;
           margin-bottom: 3px;
           cursor: pointer;
           display: inline-block;
       }
       .ct-legend li:before {
           width: 12px;
           height: 12px;
           position: absolute;
           left: 0;
           content: '';
           border: 3px solid transparent;
           border-radius: 2px;
       }
       .ct-legend li.inactive:before {
           background: transparent;
       }
       .ct-legend.ct-legend-inside {
           position: absolute;
           top: 0;
           right: 0;
       }
       .ct-legend.ct-legend-inside li{
           display: block;
           margin: 0;
       }
       .ct-legend .ct-series-0:before {
           background-color: #62a8ea;
           border-color: #62a8ea;
       }
       .ct-legend .ct-series-1:before {
           background-color: #7dd3ae;
           border-color: #7dd3ae;
       }
       .ct-legend .ct-series-2:before {
           background-color: #fa7a7a;
           border-color: #fa7a7a;
       }
       .ct-legend .ct-series-3:before {
           background-color: #d17905;
           border-color: #d17905;
       }
       .ct-legend .ct-series-4:before {
           background-color: #453d3f;
           border-color: #453d3f;
       }
    
</style>

<script>
$(document).ready(function($) {
  //Site.run();
  /*(function() {
    (function() {
      var defaults = $.components.getDefaults('vectorMap');
      var options = $.extend({}, defaults, {
        map: 'us_aea',
        markers: [{
          latLng: [37.1956993,-103.7662507],
          name: '1,512 Visits'
        }, {
          latLng: [33.6515936,-92.872696],
          name: '940 Visits'
        }, {
          latLng: [36.4667364,-88.4857269],
          name: '340 Visits'
        }],
        markerStyle: {
          initial: {
            r: 6,
            fill: $.colors("blue-grey", 600),
            stroke: $.colors("blue-grey", 600),
            "stroke-width": 6,
            "stroke-opacity": 0.6
          },
          hover: {
            r: 10,
            fill: $.colors("blue-grey", 500),
            "stroke-width": 0
          }
        }
      }, true);

      $('#widgetJvmap').vectorMap(options);
    })();
  })();*/


  // Widget Linepoint
  // ----------------
  (function() {
    new Chartist.Line("#widgetLinepoint .ct-chart", {
      labels: [<?php echo $labelIngresos;  ?>],
      series: [  [ <?php echo $dataIngresos;  ?> ] ]
    }, {
      low: 0,
      showArea: false,
      showPoint: true,
      showLine: true,
      fullWidth: true,
      lineSmooth: false,
      chartPadding: {
        top: 10,
        right: -4,
        bottom: 10,
        left: -4
      },
      axisX: {
        showLabel: false,
        showGrid: false,
        offset: 0
      },
      axisY: {
        showLabel: false,
        showGrid: false,
        offset: 0
      },
      plugins: [
        Chartist.plugins.tooltip()
      ]
    });
  })();

  // Widget Sale Bar
  // ---------------
  (function() {
    new Chartist.Bar("#widgetSaleBar .ct-chart", {
      labels: [<?php echo $labelVenta;  ?>],
      series: [ [<?php echo $dataVenta;  ?>] ]
    }, {
      low: 0,
      fullWidth: true,
      chartPadding: {
        top: 0,
        right: 20,
        bottom: 30,
        left: 20
      },
      axisX: {
        showLabel: false,
        showGrid: true,
        offset: 0
      },
      axisY: {
        showLabel: false,
        showGrid: true,
        offset: 0
      },
      plugins: [
        Chartist.plugins.tooltip()
      ]
    });
  })();



  // Widget Overall Views
  // --------------------
  
  (function() {
    new Chartist.Line("#widgetOverallViews .line-chart", {
      labels: [<?php echo $labelDiferenciaDias;  ?>],
      series: [           
          [<?php echo $dataIngresosDias;  ?>] , 
          [<?php echo $dataVentaDias;  ?>] 
      ]
          
    }, {
      
      showArea: false,
      showPoint: true,
      showLine: true,
      lineSmooth: false,
      fullWidth: true,
      chartPadding: {
        top: 10,
        right: 10,
        bottom: 10,
        left: 10
      },
      axisX: {
        showLabel: true,
        showGrid: true,
        offset: 50
      },
      axisY: {
        showLabel: true,
        showGrid: true,
        offset: 50
      },
      plugins: [
        Chartist.plugins.tooltip(),
        Chartist.plugins.legend({
            legendNames: ['Ingresos', 'Ventas']
        })
      ]
    });
  })();


  (function() {
    var snow = new Skycons({
      "color": $.colors("blue-grey", 500)
    });
    snow.set(document.getElementById("widgetSnow"), "snow");
    snow.play();

    var sunny = new Skycons({
      "color": $.colors("blue-grey", 700)
    });
    sunny.set(document.getElementById("widgetSunny"), "clear-day");
    sunny.play();
  })();


});

</script>



</body>

</html>