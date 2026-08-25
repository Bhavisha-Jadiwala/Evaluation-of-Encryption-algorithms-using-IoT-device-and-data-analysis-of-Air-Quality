<?php 
header("Content-Type: application/json");
include 'model.php';

$db=new model();
$db=$db->model();

$p=$_REQUEST;

// Takes raw data from the request
$json = file_get_contents('php://input');
$json = '{\'Lat\':0,\'Long\':0769,\'MAC\':"00:ba",\'Timestamp\':"2021-03-27 16:24:10",\'Temp\':"29.30",\'Hum\':"21.90",\'PM25\':"2.4",\'PM10\':"3.5"}';
print_r($json);
//$json=preg_replace("!\\r?\\n!","",$json);
//$json=str_replace("\","",$json);
$data = json_decode($json,true);
print_r($data);
/*$data=stripslashes($data);
$data=json_decode($data);*/
$Lat=$data['Lat'];

$Long=$data['Long'];
$MAC=$data['MAC'];
$Timestamp=$data['Timestamp'];
$tmp=$data['Temp'];
$hum=$data['Hum'];
$pm25=$data['PM25'];
$pm10=$data['PM10'];
$a['pm10']=$json;

//$date=date('Y-m-d');
//$time=date('H:i:s');

$sql="INSERT INTO `datav`(`Lat`,`Long`,`MAC`, `Timestamp`, `temperature`, `hummidity`, `pm25`, `pm10`,`data`) VALUES ('$Lat','$Long','$MAC','$Timestamp','$tmp','$hum','$pm25','$pm10','".addslashes($json)."')";




/*if (mysqli_query($db,$sql)) {
	$a['status']=1;
}
else
{
	$a['status']=mysqli_error($db);
} */

//echo json_encode($a);
?>