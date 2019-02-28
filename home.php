<?php
include "db_config.php";
$connect=mysqli_connect($server,$username,$dbpassword,$dbname);

if(mysqli_connect_errno($connect))
 {
    echo 'Failed to connect to database: '.mysqli_connect_error();
}

$Userlogin=mysqli_real_escape_string($connect,$_POST['email']);
$Userpassword=mysqli_real_escape_string($connect,$_POST['password']);

$result=mysqli_query($connect, "select * from users where email='$Userlogin'");

if($result)
{

    if(mysqli_num_rows($result)>0)
    {

    
   
    while($row=mysqli_fetch_array($result))
        {

        $id=$row['id'];
        $email=$row['email'];
        $password=$row['password'];
        
    
        }

        if ($Userpassword == $password )
         {

            echo "Welcome User: $email <br>";
    

            echo "<br/>";
            echo "<br/>";

         }
         else if ($Userlogin==$email && $Userpassword!= $password)
         {
            echo "Wrong passsword";
         }
         
    }

}
if(mysqli_num_rows($result)==0)
{
    echo "Email $Userlogin is not registered";
}
?>