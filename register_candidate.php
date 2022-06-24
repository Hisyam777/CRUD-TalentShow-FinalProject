<?php 
// This page is for NON REGISTER CUSTOMER - make reservation
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Talent Registration Form';
include ('includes/header1.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.

	
	// Check for an username:
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$u = trim($_POST['username']);
	}	

	// Check for a password:
	if (empty($_POST['password'])) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$pass = trim($_POST['password']);
	}

	// Check for a first name:
	if (empty($_POST['f_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = trim($_POST['f_name']);
	}
	
	// Check for a last name:
	if (empty($_POST['l_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = trim($_POST['l_name']);
	}

 	// Check for an address:
    if (empty($_POST['address'])) {
        $errors[] = 'You forgot to enter your Address.';
    } else {
        $add = trim($_POST['address']);
    }	
	
	// Check for a phone number:
	if (empty($_POST['mobilehp'])) {
		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$ph = trim($_POST['mobilehp']);
	}

	// Check for a category:
	if (empty($_POST['category'])) {
		$errors[] = 'You forgot to choose your category.';
	} else {
		$c = trim($_POST['category']);
	}	

	// Check for a length:
	if (empty($_POST['length'])) {
		$errors[] = 'You forgot to enter your length.';
	} else {
		$l = trim($_POST['length']);
	}

	// Check for audition date:
	if (empty($_POST['audition_date'])) {
		$errors[] = 'You forgot to enter your audition date.';
	} else {
		$a_date = trim($_POST['audition_date']);
	}

		
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		require ('../mysqli_connect.php'); // Connect to the db.

		// Make the query
		$query1 = "INSERT INTO talent_candidate (f_name, l_name, mobilehp, username, password) 
		VALUES ('$fn', '$ln','$ph', '$u', SHA1('$pass'))";		
		$r1 = mysqli_query($dbc, $query1); // Run the query.
		$candi_id = mysqli_insert_id($dbc); // Return latest id from

		$query2 = "INSERT INTO talent_booking (category, length, audition_date) 
		VALUES ('$c', '$l','$a_date')";		
		$r2 = mysqli_query($dbc, $query2); // Run the query.
		$book_id = mysqli_insert_id($dbc); // Return latest id from

		if ($r1 && $r2) { // If it ran OK.

			 // Make the query for complete_info
			 $query3 = "INSERT INTO talent_complete_info (candi_id, book_id, address) 
			 VALUES ($candi_id, '$book_id', '$add')";		
			 $r3 = mysqli_query ($dbc, $query3); // Run the query.

							 if ($r3) { // If it ran OK.

								 // Display thank you message
								 echo "<h1>Process Complete!</h1>";
								 echo "<p>Your account has been successfully registered!</p>";
												 
							 } else { // If it did not run OK.
								 
								 // Public message:
								 echo '<h1>System Error</h1>
								 <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
						 
								 // Debugging message:
								 echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query3 . '</p>';

							 } // End of if ($r3) IF.

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query1 . '<br/>' . $query2 . '</p>';                 
				
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>

<div class="container p-1 bg-dark text-white col-11">	<!-- Start of the page-specific content. -->
		<div class="row">
			<div class="col-xl-8">
	<br>

<form action="register_candidate.php" method="post">

<h1 class="col-xl-8"><i class="fas fa-user-friends"></i> Candidate Detail</h1>
<br>
<div class="col-xl-8">
	<label >Username</label>
	<input type="text" class="form-control  " name="username"  placeholder="Enter username" required>
	<small class="form-text text-muted">We'll never share your username with anyone else.</small>
</div>

<div class="col-xl-8">
	<label >Password</label>
	<input type="password" class="form-control  " name="password"  placeholder="Enter password" required>
	<small class="form-text text-muted">Your password is safe with us!</small>
</div>

<div class="col-xl-8">
	<label >Phone Number: </label>
	<input type="text" class="form-control  " name="mobilehp"  placeholder="Enter Phone number" required>
	<small class="form-text text-muted">Your phone number ok? hehe</small>
</div>

<div class="col-xl-8">
	<label >First Name:</label>
	<input type="text" class="form-control  " name="f_name"  placeholder="Enter First Name" required>
	<small class="form-text text-muted">Your first name is ... blablabla</small>

</div>

<div class="col-xl-8">
	<label >Last Name:</label>
	<input type="text" class="form-control  " name="l_name"  placeholder="Enter Last Name" required>
	<small class="form-text text-muted">Your last name is ... blablabla</small>

</div>

<div class="col-xl-8">
	<label >Address:</label>
	<input type="text" class="form-control  " name="address"  placeholder="Enter Address" required>
	<small class="form-text text-muted">Your address ... blablabla</small>

</div>
<br>
<h1 class="col-xl-8"><i class="far fa-calendar-plus"></i> Booking Detail</h1>
<br>
<div class="col-xl-8">
<p><b>Category: </b>

<select class="form-select col-4" name="category">
<option value="">Choose one</option>
<option value="Dance">Dance</option>
<option value="Comedy">Comedy</option>
<option value="Musical Show">Musical Show</option>
<option value="Singing">Singing</option>
</select>

</p>

<p><b>Length of Act </b><br>
<br>
<input type="radio" id="10min" name="length" value="10 minutes" required>
  <label for="10min">10 minutes</label><br>
  <input type="radio" id="15min" name="length" value="15 minutes" required>
  <label for="15min">15 minutes</label><br>
  <input type="radio" id="20min" name="length" value="20 minutes" required>
  <label for="20min">20 minutes</label> </p>


<p><b>Audition Date: </b>
<input type="date" name="audition_date"></p>
<br>
<button type="submit" class="btn btn-lg btn-primary btn-block">Book Now</button>
</form>
</div> <!--div for starting from category and this is the end lol -->

</div>
</div>
</div>
<?php include ('includes/footer.html'); ?>