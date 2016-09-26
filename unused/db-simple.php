<?php
echo "<p>Hello world!</p>";

//database variables
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "plates";

//SQL host, user, pass
@mysql_connect("$db_host","$db_username","") or die ("could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");

echo '<p>Database connection successful.<p>';

/*
necessary SQL columns: associated form entry names

id: -
form_id: formID
state: state
plate_number: plate
speeding: speeding
reckless: reckless
turn_signal: signal
distracted: distracted
hour: hour
minute: minute
am_pm: amPm
day: day


*/

$form_id = $_POST['formID'];
$state = $_POST['state'];
$plate_number = $_POST['plate'];

//checkboxes default to 0
$speeding = 0;
$reckless = 0;
$turn_signal = 0;
$distracted = 0;

//set to 1 if checked
if( isset($_POST['speeding']) ) {
	$speeding = $_POST['speeding'];
}
if( isset($_POST['reckless']) ) {
	$reckless = $_POST['reckless'];
}
if( isset($_POST['signal']) ) {
	$turn_signal = $_POST['signal'];
}
if( isset($_POST['distracted']) ) {
	$distracted = $_POST['distracted'];
}

$hour = $_POST['hour'];
$minute = $_POST['minute'];
$am_pm = $_POST['amPm'];
$day = $_POST['day'];
$submit =$_POST['submit'];


if($_POST['submit'] == "submit")
{
	echo '<h1> Thanks for submitting! </h1>';
}
elseif($_POST['submit'] == "search")
{
	echo '<h1> here are your search results! </h1>';
}
echo '<p> form_id: ' . $form_id . '</p>';
echo '<p> state: ' . $state . '</p>';
echo '<p> plate_number: ' . $plate_number . '</p>';
echo '<p> speeding: ' . $speeding . '</p>';
echo '<p> reckless: ' . $reckless . '</p>';
echo '<p> turn_signal: ' . $turn_signal . '</p>';
echo '<p> distracted: ' . $distracted . '</p>';
echo '<p> hour: ' . $hour . '</p>';
echo '<p> minute: ' . $minute . '</p>';
echo '<p> am_pm: ' . $am_pm . '</p>';
echo '<p> day: ' . $day . '</p>';
echo '<p> submit: ' . $submit . '</p>';


$sql = "INSERT INTO submitted (form_id, state, plate_number, speeding, reckless, turn_signal, distracted, hour, minute, am_pm, day) VALUES ('$form_id', '$state', '$plate_number', '$speeding', '$reckless', '$turn_signal', '$distracted', '$hour', '$minute', '$am_pm', '$day')";

if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}

mysql_close();

echo '<p>data submitted to database!</p>';
echo '<p><a href="pl8s-simple.php">HOME</a></p>';


?>

