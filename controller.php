<?php
include("model.php");

$p=$_REQUEST;
if(isset($p['fun']))
{
    $c = new model();
    switch($p['fun'])
    {
        case 'fetchmarker':
            echo json_encode($c->show_m());
            break;
        
        case 'fetchgaugedata':
            echo json_encode($c->show_data($p['lat'],$p['long']));
            break;

        case 'fetchmarkerid':
            echo json_encode($c->show_markerid($p['name']));
            break;

        case 'fetch_lastweekdata':
            echo $c->show_weeklydata_tmp($p['type'],$p['lat'],$p['long']);    
            break;

        case 'fetch_lastweekalldata':
            echo $c->fetch_lastweekalldata($p['lat'],$p['long']);
            break;
    }
}



 
?>
