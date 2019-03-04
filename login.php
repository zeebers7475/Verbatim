<?php

include "dbconfig.php";

$con=mysqli_connect($server, $login, $password, $dbname) or die("<br>Cannot connect to DB\n");

$query = "select * from verbatim.users";

echo "<br>$query\n";
$result = mysqli_query($con, $query);

if($result) { 
	if (mysqli_num_rows($result)>0) {
		echo "<TABLE border=1>\n";
		echo "<TR><TD>ID<TD>Email\n";
		while($row = mysqli_fetch_array($result)){
		$id = $row['id'];
		$email = $row['email'];
		echo "<TR><TD>$id<TD>$email\n";
	}
	echo "</TABLE>\n";
	}	else
		echo "<br>No records found in query: $query\n";
}

else
  echo "<br>NO result, something wrong, error" . mysqli_error() . "\n";

mysqli_free_result($result);
mysqli_close($con);

?>