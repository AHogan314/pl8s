<?php
/*
TODO: FIGURE OUT TIMESTAMP FOR RESULTS
*/

//database variables
include("db.php");
//SQL host, user, pass
@mysql_connect("$db_host","$db_username","") or die ("could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");

session_start();
$state = $_SESSION['state'];
$plate_number = $_SESSION['plate'];

$sql = mysql_query("SELECT * FROM submitted WHERE state = '$state' AND plate_number = '$plate_number'");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
	</head>
	<body>
		<!-- navigation bar -->
		<?php include("navbar.php");?>
		<div class="container">	
			<!--jumbotron-->
			<div class = "row">
				<div class = "jumbotron text-center">
					<?php
						if (mysql_num_rows($sql)==0){ 
    						echo '<h4 class = "lobster-font" >No results found for</h4>';
    					}
    					else {
							echo '<h4 class = "lobster-font" >Search results for</h4>';
    					} 
    				?>					
					<h1 class = "lobster-font" ><?php echo $state . ' ' . $plate_number; ?></h1>
				</div>
			</div>
			<!--results list-->
			<div class="text-center">
				<?php
					while($row = mysql_fetch_array($sql)) {
		
						$id = $row["id"];
						switch ($row["infraction"]) {
							case "1":
						        $infraction = 'Speeding';
						        break;
						    case "2":
						        $infraction = 'Tailgating';
						        break;
						   	case "3":
						        $infraction = 'Running a stop sign/light';
						        break;
						    case "4":
						        $infraction = 'Using a phone while driving';
						        break;
						    case "5":
						        $infraction = 'Failure to yield right of way';
						        break;
						    case "6":
						        $infraction = 'Failure to signal for turn/lane change';
						        break;
						    case "7":
						        $infraction = 'Failing to drive within a single lane';
						        break;
						    case "8":
						        $infraction = 'Crossing over a center divider or median';
						        break;
						    case "9":
						        $infraction = 'Driving on the shoulder';
						        break;
						    case "10":
						        $infraction = 'Failure to use a seat belt';
						        break;
						    case "11":
						        $infraction = 'Failure to stop for a pedestrian';
						        break;
						    case "12":
						        $infraction = 'Failure to stop for a school bus';
						        break;
						    case "13":
						        $infraction = 'Failure to secure a load in truck bed/trailer';
						        break;
						    case "14":
						        $infraction = 'Driving in a car pool lane illegally';
						        break;
						    case "15":
						        $infraction = 'Other';
						        break;
						}
						$comment = $row["comment"];
						$hour = $row["hour"];
						if( $row["minute"] == 0) {
							$minute = "00";
						}
						else {
							$minute = $row["minute"];
						}
						switch ($row["am_pm"]) {
							case "1":
						        $am_pm = 'AM';
						        break;
						    case "0":
						    	$am_pm = 'PM';
						    	break;
						}
						$day = $row["day"];
						switch ($row["month"]) {
						    case "1":
						        $month = 'January';
						        break;
						    case "2":
						        $month = 'February';
						        break;
						    case "3":
						        $month = 'March';
						        break;
						    case "4":
						        $month = 'April';
						        break;
						    case "5":
						        $month = 'May';
						        break;
						    case "6":
						        $month = 'June';
						        break;
						    case "7":
						        $month = 'July';
						        break;
						    case "8":
						        $month = 'August';
						        break;
						    case "9":
						        $month = 'September';
						        break;
						    case "10":
						        $month = 'October';
						        break;
						    case "11":
						        $month = 'November';
						        break;
						    case "12":
						        $month = 'December';
						        break;
						}
						$year = $row["year"];
														
						echo '<h3>' . $month . ' ' . $day . ' ' . $year . ' <small class="text-muted"> ' . $hour . ':' . $minute . ' ' . $am_pm . ' ' . $year;
						echo '</small> </h3> <h4>' . $infraction . '<br>' . $comment . '</h4>';
					};
				?>
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


