<?php
$newemail=$_POST ["email"];
$newpassword=$_POST ["password"];

include "dbconfig.php";

$con=mysqli_connect($server, $login, $password, $dbname) or die("<br>Cannot connect to DB\n");

$create = "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, '$newemail', '$newpassword')";

$query1= "SELECT id, email FROM verbatim.users where email = '$newemail'";

$result1 = mysqli_query($con, $query1);

if($result1) {
	if (mysqli_num_rows($result1)>0)

    echo "Sorry that Email is already used.";
    
else

    mysqli_query($con, $create);
    
}

echo "<br><br> Thank you for Creating an account!";

mysqli_close($con);
?>