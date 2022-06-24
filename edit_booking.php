<?php 
// This page is for ADMIN - editing reservation
session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['candidate_id'])) {

	// Need the functions:
	require ('includes/login_functions.inc.php');
	redirect_user();	

}

$page_title = 'Edit Booking';
include ('includes/header1.html');
echo '<h1><i class="fas fa-pen"></i> Edit booking Details</h1>';

$id = $_SESSION['candidate_id'];


require ('../mysqli_connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['category'])) {
		$errors[] = 'You forgot to enter your category.';
	} else {
		$c = mysqli_real_escape_string($dbc, trim($_POST['category'])); //escapes special characters in a string for use in an SQL query
	}
	
	// Check for a last name:
	if (empty($_POST['length'])) {
		$errors[] = 'You forgot to enter your length.';
	} else {
		$l = mysqli_real_escape_string($dbc, trim($_POST['length']));
	}

	// Check for a mobilehp:
	if (empty($_POST['audition_date'])) {
		$errors[] = 'You forgot to select your audition date.';
	} else {
		$au = mysqli_real_escape_string($dbc, trim($_POST['audition_date']));
	}
	

	if (empty($errors)) { // If everything's OK.
	
			// Make the query:
			$q = "UPDATE talent_booking SET category='$c', length='$l', audition_date='$au' 
			WHERE booking_id=$id LIMIT 1"; 

			$r = mysqli_query ($dbc, $q);	
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The booking details has been updated.</p>';	
				
			} else { // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
					
	} else { // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT category, length, audition_date FROM talent_booking WHERE booking_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM); //MYSQLI_ASSOC
	
	// Create the form:
	echo '<form action="edit_booking.php" method="post">
	<br>
	<p>Category: <select name="category">';
    $cat = array("Dance", "Comedy", "Musical Show", "Singing");
    foreach ($cat as $value){
        if($row[0] == $value) { // creating sticky
            echo "<option value='". $row[0] ."' selected>". $row[0] ."</option>";
        }else{
            echo "<option value=\"$value\">$value</option>";
        }
    }
    echo'</select></p>
	<br>
	<p>Length: <select name="length">';
    $lengths = array("10 minutes", "15 minutes", "20 minutes");
    foreach ($lengths as $value){
        if($row[1] == $value) { // creating sticky
            echo "<option value='". $row[1] ."' selected>". $row[1] ."</option>";
        }else{
            echo "<option value=\"$value\">$value</option>";
        }
    }
    echo'</select></p>	
	<br>
	<p>Audition Date: <input type="date" name="audition_date" value="' . $row[2] . '">
	</br>
	<br>
	<button type="submit" class="btn btn-lg btn-primary  ">Update</button>
    <input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.html');
?>