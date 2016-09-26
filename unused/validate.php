<?php
	
	//debugging
	print_r($_POST);


	if($_POST)
	{
		
		//create error array
		$errors = array();
		print_r($errors);

		//search validation
		//checks if state selected

		if($_POST['formID'] == "form1")
		{
			//validate submit data
		}
		elseif($_POST['formID'] == "form2")
		{
			//validate search data
			if(empty$_POST['state'])
			{
				$errors['state1'] = "Select a state";
			}
			//checks if plate entered and 10 characters or less
			if(empty($_POST['plate']))
			{
				$errors['plate1'] = "Field cannot be blank";
			}
			//checks length of input
			if(strlen($_POST['plate']) > 10)
			{
				$errors['plate2'] = "Plate number cannot be over 10 characters";
			}	
		else
		{
			//error occurred
		}



		//check errors
		if(count($errors) == 0)
		{
			//assign variables to session so you can use them on the next page
			session_start();
			$_SESSION['firstName'] = $_POST['firstName'];
			$_SESSION['lastName'] = $_POST['lastName'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
			//redirect to success page
			header("Location: success.php");
			exit();
		}
	}
?>