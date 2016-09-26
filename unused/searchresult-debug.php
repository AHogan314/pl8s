<?php
/*TODO:
add "no results" option if no results found
format checkbox display results
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
			<title>Submission</title>
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
						<h4 class = "lobster-font" >Search results for</h4>
						<h1 class = "lobster-font" ><?php echo $state . ' ' . $plate_number; ?></h1>
						
					</div>
				</div>
				<!--results list-->
				<div class="text-center">
					<?php
						while($row = mysql_fetch_array($sql)) {
							$id = $row["id"];
							$speeding = $row["speeding"];
							$reckless = $row["reckless"];
							$turn_signal = $row["turn_signal"];
							$distracted = $row["distracted"];
							$hour = $row["hour"];
							if( $row["minute"] == 0) {
								$minute = "00";
							}
							else {
								$minute = $row["minute"];
							}
							$am_pm = $row["am_pm"];
							$day = $row["day"];
							

							
							echo '<h3> (DATE) <small class="text-muted"> ' . $hour . ':' . $minute . ' ';
							if($am_pm = 1){
								echo 'AM: ';
							}
							else {
								echo 'PM: ';
							}
							echo '</small> </h3> <h4>';
							if($speeding == 1){
								echo 'speeding <br>';
							}
							if($reckless == 1){
								echo 'reckless driving <br>';
							}
							if($turn_signal == 1){
								echo 'no turn signal <br>';
							}
							if($distracted == 1){
								echo 'distracted driving';
							
							}	
							
							echo '</h4>';
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


