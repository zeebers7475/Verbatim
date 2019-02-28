<?php
include "db_config.php";
# 1. Open a Connection to the MySQL Server
$con=mysqli_connect($server, $username, $dbpassword, $dbname)
	or die("Connection Failed");
#2. Execute the SQL query and return records
$keyword='te';
$query = "SELECT email FROM verbatim.users where email like '%$keyword%'";
echo "<br>Query: $query\n";
$result = mysqli_query($con, $query);
#3. Fetch the data from the database, one row
$row = mysqli_fetch_array($result);
echo "<br>email: " . $row['email'] . "\n";

#4. Free result set
mysqli_free_result($result);
#5. Close a Connection
mysqli_close($con);






?>