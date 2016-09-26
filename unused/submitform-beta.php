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
		//check errors
		if(count($errors) == 0)
		{
			//assign variables to session
			session_start();
			$_SESSION['state'] = $_POST['state'];
			$_SESSION['plate'] = $_POST['plate'];
			//redirect to search result page
			header("Location: searchresult.php");
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
	<form class="form-horizontal" action="submit.php" method="post" />
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
			<!-- Infractions -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="checkboxes">Infractions</label>
			  	<div class="col-md-4">
			  		<div class="checkbox">
			    		<label for="checkboxes-0">
			      			<input type="checkbox" name="speeding" id="checkboxes-0" value="1">Speeding
			    		</label>
					</div>
				  	<div class="checkbox">
				    	<label for="checkboxes-1">
				      		<input type="checkbox" name="reckless" id="checkboxes-1" value="1">Reckless Driving
				    	</label>
					</div>
					<div class="checkbox">
				    	<label for="checkboxes-2">
				      		<input type="checkbox" name="signal" id="checkboxes-2" value="1">No turn signal
				    	</label>
					</div>
					<div class="checkbox">
				    	<label for="checkboxes-3">
				      		<input type="checkbox" name="distracted" id="checkboxes-3" value="1">Distracted Driving 
				    	</label>
					</div>
				</div>
			</div>

								<!-- Date -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="selectbasic">Date</label>
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
									   	   	<select id="selectbasic" name="day" class="form-control form-control-modified">
									      	<option value="1">Today</option>
									      	<option value="0">Yesterday</option>
									   	</select>
							  		</div>
							  	</div>


								<!-- Button -->
								<div class="form-group text-center">
								  	<label class="col-md-4 control-label" for="singlebutton"></label>
							  		<div class="col-md-4">
							    		<button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
							  		</div>
								</div>
							</fieldset>
						</form>
					</div>
			  	</div>


<!--search form-->
<div>
	<form class="form-horizontal" action="" method="post" />
		<fieldset>
			<input type="hidden" name="formID" value="form1">
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
			<!-- Button -->
			<div class="form-group text-center">
				<label class="col-md-4 control-label" for="singlebutton"></label>
			  	<div class="col-md-4">
			    	<button id="singlebutton" name="singlebutton" class="btn btn-lg btn-primary">Search</button>
			  	</div>
			</div>
		</fieldset>
	</form>
</div>




