<?php
// ADMIN can view all the records in this page. 
// This script retrieves all the records from the users table.
// This file links to edit and delete pages.
// If no session value is present, redirect the user:
session_start(); // Start the session.
if (!isset($_SESSION['admin_id'])) {

	// Need the functions:
	require ('includes/login_functions.inc.php');
	redirect_user();	

}

$page_title = 'View all booking detail';
include ('includes/header1.html');
echo '<h1><i class="fas fa-clipboard"></i> Booking List</h1>';

require ('../mysqli_connect.php');
	

// Define the query:
/*$query1 = "SELECT talent_candidate.f_name, talent_candidate.l_name, talent_candidate.mobilehp, 
talent_booking.category, talent_booking.length, talent_booking.audition_date FROM talent_candidate, talent_booking WHERE talent_candidate.candidate_id
= talent_booking.booking_id ORDER BY talent_candidate.candidate_id"; */

// Define the query:
$query1 = "SELECT * FROM talent_complete_info
LEFT JOIN talent_candidate ON talent_candidate.candidate_id = talent_complete_info.candi_id
LEFT JOIN talent_booking ON talent_booking.booking_id = talent_complete_info.book_id";

$r = mysqli_query ($dbc, $query1);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num booking.</p>\n";

	// Table header:
	echo '<table class="table table-striped text-light" align="center" cellspacing="6" cellpadding="6" width="120%">
	<tr>
		<td align="left"><b><i class="fas fa-user-minus"></i> Delete</b></td>
		<td align="left"><b>First Name</b></td>
        <td align="left"><b>Last Name</b></td>
		<td align="left"><b>Mobile Phone</b></td>
		<td align="left"><b>Category</b></td>
		<td align="left"><b>Length</b></td>
		<td align="left"><b>Audition date</b></td>
	</tr>
	';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>

		<td align="left"><button type="submit" class="btn btn-danger "><a class="text-light" href="delete_admin_booking.php?id=' . $row['candidate_id'] . '">Delete</a></button></td>
			<td align="left">' . $row['f_name'] . '</td>
			<td align="left">' . $row['l_name'] . '</td>
			<td align="left">' . $row['mobilehp'] . '</td>
			<td align="left">' . $row['category'] . '</td>
			<td align="left">' . $row['length'] . '</td>
			<td align="left">' . $row['audition_date'] . '</td>
		</tr>
		';
	}

	echo '</table>';
	mysqli_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There are currently no booking made yet.</p>';
}

mysqli_close($dbc);

include ('includes/footer.html');
?>