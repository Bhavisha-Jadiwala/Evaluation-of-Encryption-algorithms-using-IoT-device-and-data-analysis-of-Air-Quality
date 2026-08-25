<?php
class model
{	
	// 1 Connection
	function model()
	{
		return mysqli_connect("localhost","up957915","A8foy7&8","up957915_");
	}
	
	// 2 get all data
	 function show_m()
      {
            $q=mysqli_query($this->model(),"SELECT * FROM `datav`");
            return mysqli_fetch_all($q,MYSQLI_ASSOC);
      }
      
      function show_data($lat,$long)
      {
        $q=mysqli_query($this->model(),"SELECT * FROM `datav` WHERE `Lat`='$lat' AND `Long`='$long' ORDER BY `id` DESC LIMIT 1");
            return mysqli_fetch_array($q,MYSQLI_ASSOC);
      }

      function show_markerid($name)
      {
            $q=mysqli_query($this->model(),"SELECT * FROM `datav` WHERE `id`='$name'");
            return mysqli_fetch_array($q,MYSQLI_ASSOC);
      }

      function fetch_lastweekalldata($lat,$long)
      {
            $data=array();
            for($i=0;$i<7;$i++)
            {
                  $date=date('Y-m-d',strtotime(date('Y-m-d').'-'.$i.' days'));
                  $sql1="SELECT `Timestamp`,`temperature` FROM `datav` WHERE DATE(`Timestamp`)='$date' AND `Lat`='$lat' AND `Long`='$long' ORDER BY temperature DESC LIMIT 1";
                  $q1=mysqli_query($this->model(),$sql1);


                  $sql2="SELECT `Timestamp`,`hummidity` FROM `datav` WHERE DATE(`Timestamp`)='$date' AND  `Lat`='$lat' AND `Long`='$long' ORDER BY hummidity DESC LIMIT 1";
                  $q2=mysqli_query($this->model(),$sql2);


                  $sql3="SELECT `Timestamp`,`pm25` FROM `datav` WHERE DATE(`Timestamp`)='$date' AND  `Lat`='$lat' AND `Long`='$long' ORDER BY `pm25` DESC LIMIT 1";
                  $q3=mysqli_query($this->model(),$sql3);


                  $sql4="SELECT `Timestamp`,`pm10` FROM `datav` WHERE DATE(`Timestamp`)='$date' AND  `Lat`='$lat' AND `Long`='$long' ORDER BY `pm10` DESC LIMIT 1";
                  $q4=mysqli_query($this->model(),$sql4);

                  if (mysqli_num_rows($q1)>0 || mysqli_num_rows($q2)>0 || mysqli_num_rows($q3)>0 || mysqli_num_rows($q4)>0) {
                        

                  $d=array();
                  
                        
                        if (mysqli_num_rows($q1)>0) {
                              
                              $da=mysqli_fetch_array($q1,MYSQLI_ASSOC);
                             
                             $d['Timestamp']=$da['Timestamp'];
                              $d['data1']=$da['temperature'];
                        }
                        else
                        {
                              $d['data1']='';
                        }

                        if (mysqli_num_rows($q2)>0) {
                              
                              $da=mysqli_fetch_array($q2,MYSQLI_ASSOC);
                              $d['Timestamp']=$da['Timestamp'];
                              $d['data2']=$da['hummidity'];
                        }
                        else
                        {
                              $d['data2']='';
                        }

                        if (mysqli_num_rows($q3)>0) {
                              
                              $da=mysqli_fetch_array($q3,MYSQLI_ASSOC);
                              $d['Timestamp']=$da['Timestamp'];
                              $d['data3']=$da['pm25'];
                        }
                        else
                        {
                              $d['data3']='';
                        }

                        if (mysqli_num_rows($q4)>0) {
                              
                              $da=mysqli_fetch_array($q4,MYSQLI_ASSOC);
                              $d['Timestamp']=$da['Timestamp'];
                              $d['data4']=$da['pm10'];
                        }
                        else
                        {
                              $d['data4']='';
                        }
                        array_push($data, $d);

                  }
            }

            return json_encode($data);
      }

      function show_weeklydata_tmp($type,$lat,$long)
      {

            $wh='';
            if ($type==1) {
                  $wh.='`temperature`';
            }
            else if ($type==2) {
                  $wh.='`hummidity`';
            }
            else if ($type==3) {
                  $wh.='`pm25`';
            }
            else if ($type==4) {
                  $wh.='`pm10`';
            }

            $data=array();

            for($i=0;$i<7;$i++)
            {
                  $date=date('Y-m-d',strtotime(date('Y-m-d').'-'.$i.' days'));
                  $sql="SELECT `Timestamp`,".$wh." FROM `datav` WHERE DATE(`Timestamp`)='$date' AND `Lat`='$lat' AND `Long`='$long' ORDER BY ".$wh." DESC LIMIT 1";
                  $q=mysqli_query($this->model(),$sql);
                  if (mysqli_num_rows($q)>0) {
                        
                  $d=mysqli_fetch_array($q,MYSQLI_ASSOC);
                  $d['dt']=date('d M',strtotime($d['Timestamp']));
                  switch ($type) {
                        case 1:
                              $d['data']=$d['temperature'];
                              break;
                        
                        case 2:
                              $d['data']=$d['hummidity'];
                              break;

                        case 3:
                              $d['data']=$d['pm25'];
                              break;

                        case 4:
                              $d['data']=$d['pm10'];
                              break;
                  }
                  
                  array_push($data, $d);

                  }
            }

            return json_encode($data);
      }
      
}
?>
