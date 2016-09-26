<?php

//database variables
include("db.php");
 
//SQL host, user, pass
@mysql_connect("$db_host","$db_username","") or die ("could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");



//CHANGE THESE TO SESSION!!!
session_start();
$form_id = $_SESSION['formID'];
$state = $_SESSION['state'];
$plate_number = $_SESSION['plate'];
$infraction = $_SESSION['infraction'];
switch ($_SESSION['infraction']) {
    case "1":
        $infraction1 = 'Speeding';
        break;
    case "2":
        $infraction1 = 'Tailgating';
        break;
   	case "3":
        $infraction1 = 'Running a stop sign/light';
        break;
    case "4":
        $infraction1 = 'Using a phone while driving';
        break;
    case "5":
        $infraction1 = 'Failure to yield right of way';
        break;
    case "6":
        $infraction1 = 'Failure to signal for turn/lane change';
        break;
    case "7":
        $infraction1 = 'Failing to drive within a single lane';
        break;
    case "8":
        $infraction1 = 'Crossing over a center divider or median';
        break;
    case "9":
        $infraction1 = 'Driving on the shoulder';
        break;
    case "10":
        $infraction1 = 'Failure to use a seat belt';
        break;
    case "11":
        $infraction1 = 'Failure to stop for a pedestrian';
        break;
    case "12":
        $infraction1 = 'Failure to stop for a school bus';
        break;
    case "13":
        $infraction1 = 'Failure to secure a load in truck bed/trailer';
        break;
    case "14":
        $infraction1 = 'Driving in a car pool lane illegally';
        break;
    case "15":
        $infraction1 = 'Other';
        break;
   
}
$comment = $_SESSION['comment'] ;
$hour = $_SESSION['hour'];
$am_pm = $_SESSION['amPm'];
$minute = $_SESSION['minute'];
if($_SESSION['amPm'] == '1') {
	$am_pm1 = 'AM';
}
else {
	$am_pm1 = 'PM';
}


switch ($_SESSION['month']) {
    case "1":
        $month1 = 'January';
        break;
    case "2":
        $month1 = 'February';
        break;
    case "3":
        $month1 = 'March';
        break;
    case "4":
        $month1 = 'April';
        break;
    case "5":
        $month1 = 'May';
        break;
    case "6":
        $month1 = 'June';
        break;
    case "7":
        $month1 = 'July';
        break;
    case "8":
        $month1 = 'August';
        break;
    case "9":
        $month1 = 'September';
        break;
    case "10":
        $month1 = 'October';
        break;
    case "11":
        $month1 = 'November';
        break;
    case "12":
        $month1 = 'December';
        break;
}
$month = $_SESSION['month'];
$day = $_SESSION['day'];
$year = $_SESSION['year'];

$sql = "INSERT INTO submitted (form_id, state, plate_number, infraction, comment, hour, minute, am_pm, month, day, year, date) VALUES ('$form_id', '$state', '$plate_number', '$infraction', '$comment', '$hour', '$minute', '$am_pm', '$month', '$day', '$year', CURDATE())";

if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}

mysql_close();

?>

<!DOCTYPE html>

	<html>
		<head>
			<title>Submission</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
			<link href = "css/bootstrap.min.css" rel = "stylesheet">
			<link href = "css/styles.css" rel = "stylesheet">
			<!--redirect-->
			<meta http-equiv="refresh" content="10; url=index.php" />
		</head>

		<body>
			<!-- navigation bar -->
			<?php include("navbar.php");?>
			<!-- this div controls body width below the nav bar; without it margins and scroll bars are odd/erratic -->
			<div class="container">	
				<!--jumbotron-->
				<div class = "row">
					<div class = "jumbotron text-center">
						<h4 class = "lobster-font" >Submission confirmation</h4>			
						<h1 class = "lobster-font" ><?php echo $state . ' ' . $plate_number; ?></h1>
						<h4><?php echo $hour . ':' . $minute . ' ' . $am_pm1 . ' ' . $month1 . ' ' . $day . ', ' . $year; ?></h4>
						<h4><?php echo 'Infraction: ' . $infraction1; ?></h4>
						<?php echo '<h4>' . $comment . '</h4>'; ?>
					</div>
				</div>
				<!-- home button -->
				<div class="text-center">
				   	<a href="index.php" class="btn btn-primary">Home</a>
				</div>
				<!-- "about" modal -->
				<?php include("about.php");?>
				<!--necessary for javascript and bootstrap-->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			</div>
			<?php include("footer.php");?>
		</body>
	</html>






