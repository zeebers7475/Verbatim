<?php

$newemail=$_POST['email'];
$password=$_POST['password'];

/*
$cookie_name = "user";
$cookie_namevalue = "$newemail";

$cookie_pass = "pass";
$cookie_passvalue = "md5($password)";
*/

include "dbconfig.php";

$con=mysqli_connect($server, $login, $password, $dbname) or die("<br>Cannot connect to DB\n");

$create = "INSERT INTO `users` (`email`, `password`) VALUES ('$newemail', '$password')";

$query= "SELECT email FROM verbatim.users where email = '$newemail'";

$result = mysqli_query($con, $query);

if($result) {
	if (mysqli_num_rows($result)>0)

    echo "Sorry that Email is already used.";
    
    else {

        //mysqli_query($con, $create);

        if (isset($_POST['rememberme'])) {
            setcookie("user", $_POST["email"], time() + (86400 * 30)); // 86400 = 1 day
            setcookie("pass", md5($_POST["password"]), time() + (86400 * 30)); // 86400 = 1 day
        }
        else {
            /* Cookie expires when browser closes */
            setcookie("user", $_POST["email"], false);
            setcookie("pass", md5($_POST["password"]), false);
        }
    }

    mysqli_query($con, $create);

    header('Location: setup.html');
}

mysqli_close($con);

?>