<?php
	if($_POST)
	{
		//create error array
		$errors = array();
		//validate search data
		if(empty($_POST['state']))
		{
			$errors['state1'] = '<div class="error-text">Select a state</div>';
		}
		if(empty($_POST['plate']))
		{
			$errors['plate1'] = '<div class="error-text">Field cannot be blank</div>';
		}
		if(strlen($_POST['plate']) > 10)
		{
			$errors['plate2'] = '<div class="error-text">Field cannot contain over 10 characters</div>';
		}		
		if(empty($_POST['infraction']))
		{
			$errors['infraction1'] = '<div class="error-text">Select an infraction</div>';
		}
		//check errors
		if(count($errors) == 0)
		{
			//assign variables to session
			session_start();
			$_SESSION['formID'] = $_POST['formID'];
			$_SESSION['state'] = $_POST['state'];
			$_SESSION['plate'] = $_POST['plate'];
			$_SESSION['infraction'] = $_POST['infraction'];
			$_SESSION['comment'] = $_POST['comment'];
			$_SESSION['hour'] = $_POST['hour'];
			$_SESSION['minute'] = $_POST['minute'];
			$_SESSION['amPm'] = $_POST['amPm'];
			$_SESSION['month'] = $_POST['month'];
			$_SESSION['day'] = $_POST['day'];
			$_SESSION['year'] = $_POST['year'];
		
			//redirect to search result page
			header("Location: submitresult.php");
			exit();
		}
	}
?>

<!--nav buttons-->
<div class="row">
	<div class="span12 text-center">
		<p>
			<a href="index.php" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-search"></span> Search</a>
			<span class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span> Submit</span>
		</p>
	</div>
</div>

<!--submit form-->
<div>
	<form class="form-horizontal" action="" method="post" />
		<fieldset>
			<input type="hidden" name="formID" value="submit">
			<!-- State Select -->
			<div class="form-group">
			 	<label class="col-md-4 control-label" for="selectbasic">State</label>
			    <div class="col-md-4">
			    	<select id="selectbasic" name="state" class="form-control">
				    	<option value="">Select a state</option>
				      	<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
				    </select>
			    </div>
		  		<?php if(isset($errors['state1'])) echo $errors['state1']; ?>
			</div>
			<!-- Plate Number -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Plate Number</label>  
				<div class="col-md-4">
					<input id="textinput" name="plate" type="text" <?php if(isset($_POST['plate'])) { echo 'value="'. $_POST['plate'] . '" ';}else echo 'placeholder="No spaces"';?> class="form-control input-md">
			  	</div>
			  	<?php 
			  		if(isset($errors['plate1'])) echo $errors['plate1'];
			  		if(isset($errors['plate2'])) echo $errors['plate2'];
			  	?>
			</div>
			<!-- Infraction-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="selectbasic">Infraction</label>
				<div class="col-md-4">
					<select id="selectbasic" name="infraction" class="form-control">
				      	<option value="">Select an infraction</option>
						<option value="1">Speeding</option>
						<option value="2">Tailgating</option>
						<option value="3">Running a stop sign/light</option>
						<option value="4">Using a phone while driving</option>
						<option value="5">Failure to yield right of way</option>
						<option value="6">Failure to signal for turn/lane change</option>
						<option value="7">Failing to drive within a single lane</option>
						<option value="8">Crossing over a center divider or median</option>
						<option value="9">Driving on the shoulder</option>
						<option value="10">Failure to use a seat belt</option>
						<option value="11">Failure to stop for a pedestrian</option>
						<option value="12">Failure to stop for a school bus</option>
						<option value="13">Failure to secure a load in truck bed/trailer</option>
						<option value="14">Driving in a car pool lane illegally</option>
						<option value="15">Other</option>
					</select>
		  		</div>
		  		<?php if(isset($errors['infraction1'])) echo $errors['infraction1']; ?>
			</div>
			<!-- Comments -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Comments</label>  
				<div class="col-md-4">
					<input id="textinput" name="comment" type="text" placeholder="Optional" class="form-control input-md">
			  	</div>
			</div>	
			<!-- Time -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="selectbasic">Time</label>
				<div class="col-md-4" >
		    		<select id="selectbasic" name="hour" class="form-control form-control-modified">
				      	<option value="1">1</option>
				      	<option value="2">2</option>
				      	<option value="3">3</option>
				      	<option value="4">4</option>
				      	<option value="5">5</option>
				      	<option value="6">6</option>
				      	<option value="7">7</option>
				      	<option value="8">8</option>
				      	<option value="9">9</option>
				      	<option value="10">10</option>
				      	<option value="11">11</option>
				      	<option value="12">12</option>
					</select>
					<select id="selectbasic" name="minute" class="form-control form-control-modified">
				      	<option value="00">00</option>
				      	<option value="15">15</option>
				      	<option value="30">30</option>
				      	<option value="45">45</option>
				   	</select>
				   	<select id="selectbasic" name="amPm" class="form-control form-control-modified">
				      	<option value="1">AM</option>
				      	<option value="0">PM</option>
				   	</select>
				</div>
		  	</div>
			<!-- Date -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="selectbasic">Date</label>
				<div class="col-md-4" >
		    		<select id="selectbasic" name="month" class="form-control form-control-modified">
				      	<option value="1">January</option>
				      	<option value="2">February</option>
				      	<option value="3">March</option>
				      	<option value="4">April</option>
				      	<option value="5">May</option>
				      	<option value="6">June</option>
				      	<option value="7">July</option>
				      	<option value="8">August</option>
				      	<option value="9">September</option>
				      	<option value="10">October</option>
				      	<option value="11">November</option>
				      	<option value="12">December</option>
					</select>
					<select id="selectbasic" name="day" class="form-control form-control-modified">
				      	<option value="1">1</option>
				      	<option value="2">2</option>
				      	<option value="3">3</option>
				      	<option value="4">4</option>
				      	<option value="5">5</option>
				      	<option value="6">6</option>
				      	<option value="7">7</option>
				      	<option value="8">8</option>
				      	<option value="9">9</option>
				      	<option value="10">10</option>
				      	<option value="11">11</option>
				      	<option value="12">12</option>
				      	<option value="13">13</option>
				      	<option value="14">14</option>
				      	<option value="15">15</option>
				      	<option value="16">16</option>
				      	<option value="17">17</option>
				      	<option value="18">18</option>
				      	<option value="19">19</option>
				      	<option value="20">20</option>
				    	<option value="21">21</option>
				      	<option value="22">22</option>
				      	<option value="23">23</option>
				      	<option value="24">24</option>
				      	<option value="25">25</option>
				      	<option value="26">26</option>
				      	<option value="27">27</option>
				      	<option value="28">28</option>
				      	<option value="29">29</option>
				      	<option value="30">30</option>
				      	<option value="31">31</option>
				   	</select>
				   	<select id="selectbasic" name="year" class="form-control form-control-modified">
				      	<option value="2016">2016</option>
				    </select>
				</div>
		  	</div>
			<!-- Button -->
			<div class="form-group text-center">
				<label class="col-md-4 control-label" for="singlebutton"></label>
			  	<div class="col-md-4">
			    	<button id="singlebutton" name="singlebutton" class="btn btn-lg btn-primary">Submit</button>
			  	</div>
			</div>
  		</fieldset>
	</form>
</div>