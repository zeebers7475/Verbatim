<?php

$newemail=$_COOKIE["user"];
$password=$_COOKIE["pass"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$bio=$_POST["bio"];

echo $_COOKIE['user'];

include "dbconfig.php";

$con=mysqli_connect($server, $login, $password, $dbname) or die("<br>Cannot connect to DB\n");

$query= "SELECT 'email', 'password' FROM verbatim.users where email = '$newemail' AND password = '$password'";

$create = "INSERT INTO info_user (fname, lname, bio) VALUES ('$fname', '$lname', '$bio');";

$result = mysqli_query($con, $query);

if($result) {
	if (mysqli_num_rows($result)>0)

        mysqli_query($con, $create);

    else
        echo "Sorry Doesn't Work";
}

mysqli_close($con);
 
    
?>