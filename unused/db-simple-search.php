<?php
/*TODO:
add "no results" option if no results found
format checkbox display results
*/

//database variables
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "plates";

//SQL host, user, pass
@mysql_connect("$db_host","$db_username","") or die ("could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");


$state = $_POST['state'];
$plate_number = $_POST['plate'];

echo '<p> search results for <p>';
echo '<p><h1>' . $state . ' ' . $plate_number . '</h1></p>';

$sql = mysql_query("SELECT * FROM submitted WHERE state = '$state' AND plate_number = '$plate_number'");

while($row = mysql_fetch_array($sql)) {
	$id = $row["id"];
	$speeding = $row["speeding"];
	$reckless = $row["reckless"];
	$turn_signal = $row["turn_signal"];
	$distracted = $row["distracted"];
	$hour = $row["hour"];
	$minute = $row["minute"];
	$am_pm = $row["am_pm"];
	$day = $row["day"];
	
	echo '<p> (DATE) ' . $hour . ' ' . $minute . ' ';
	if($am_pm = 1){
		echo 'AM: ';
	}
	else {
		echo 'PM: ';
	}
	if($speeding = 1){
		echo 'speeding; ';
	}
	if($reckless = 1){
		echo 'reckless driving; ';
	}
	if($turn_signal = 1){
		echo 'no turn signal; ';
	}
	if($distracted = 1){
		echo 'distracted driving; ';
	}
	echo '</p>';

};

echo '<p><a href="pl8s-simple.php">HOME</a></p>';

?>

