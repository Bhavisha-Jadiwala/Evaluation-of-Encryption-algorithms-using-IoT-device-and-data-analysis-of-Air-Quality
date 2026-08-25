<?php
class model
    {
        function model()
        {    
            return mysqli_connect("localhost","up957915","A8foy7&8","up957915_");
        } 
             function com_where_m($tblnm,$fname,$vname)
    		{
    			return mysqli_query($this->model(),"SELECT * FROM $tblnm WHERE $fname='$vname'");
    		}
            /***admin inster***/
            function admin_reg_m($name,$email,$password)
            {
                return mysqli_query($this->model(),"
                INSERT INTO `register`(`id`,`name`, `email`, `password`)VALUES ('','$name','$email','$password')");
            }
            /****login****/
            function admin_login_m($emai,$passwor)
            {
            return mysqli_query($this->model(),"select * from `register` where email='$emai' and password='$passwor'");
            }       
    }
?> 