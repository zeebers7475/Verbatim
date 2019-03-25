<?php

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$bio=$_POST["bio"];
$newemail=$_COOKIE['user'];

include "dbconfig.php";

$con=mysqli_connect($server, $login, $password, $dbname) or die("<br>Cannot connect to DB\n");

$create = "INSERT INTO `info` ('id', `fname`, `lname`, `bio`) VALUES ('', '$fname', '$lname', '$bio')";

//         INSERT INTO `user_info` (`id`, `fname`, `lname`, `bio`, `account`) VALUES ('', 'I', 'I', 'Letter I', 'Z@gmail.com')

//         INSERT INTO `info` (`id`, `fname`, `lname`, `bio`) VALUES (NULL, 'MN', 'MN', 'Letter Mn')

mysqli_query($con, $create);

echo "Thank You!";

mysqli_close($con);



//header("Location: userprofile.php")
?>