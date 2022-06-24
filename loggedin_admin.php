<?php 
// This page is for ADMIN
// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['admin_id'])) {

	// Need the functions:
	require ('includes/login_functions.inc.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('includes/header1.html');

// Print a customized message:
echo "<h1><i class='fas fa-sign-in-alt'></i> Logged In!</h1>
<p>You are now logged in, {$_SESSION['username']}!</p>";
//<p><a href=\"logout.php\">Logout</a></p>";

include ('includes/footer.html');
?>