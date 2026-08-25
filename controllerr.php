<?php
session_start();
ob_start();
include("modell.php");

    class controller extends model
        {
        /**********admin reg**********/
        function insert_admin_rej()
        {
            if(isset($_REQUEST['submi']))
            {
                $name=$_REQUEST['nam'];
                $email=$_REQUEST['emai'];
                $data_type=$_REQUEST['data_typ'];
                $password=$_REQUEST['passwor'];
                
                 if($data_type==$password)
                    {
                        $cd=$this->com_where_m("register","name",$name);
                        
                             if(mysqli_num_rows($cd)==1)
                                {
                                  $er="Data is Already inserted with ".$name;
                                  return $er;
                                }
                             else  
                                 {
                                    $this->admin_reg_m($name,$email,$data_type,$password);
                                      ?> <script> alert('<?php echo "Successfull send" ?>');</script><?php   
                                   header("Location: index.php");
                                 }
                     }
			else
	       	{
		      	$er="Do not match password ";
		      	return $er;
            }
	       }
        }
    
/***************** admin login *********************************/
		 function admin_login_c()
		  {
			  if(isset($_REQUEST['login']))
			  {
				  $uname=$_REQUEST['em'];
				  $passw=$_REQUEST['pass'];
			
				  $u=$this->admin_login_m($uname,$passw);
				  
				  $ft=mysqli_fetch_array($u);
	
					 if(mysqli_num_rows($u)==1)
					 {
						$_SESSION['id']=$ft[0];
						$_SESSION['en']=$ft[1];
					    setcookie("en",$uname,time()+3600);
					   header("Location: indexx.php");
					 }
					 else
					 {
						 $err= "invalid username or password";
						 return $err;
	
					 }
			  }
		  }

    }
?>