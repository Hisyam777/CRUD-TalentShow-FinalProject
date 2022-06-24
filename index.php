<?php 
// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_menu() {
	echo '
	<img src="includes/pic1.jpg" alt="CoronaVacation" width="760" height="490">
	<h1><i class="fas fa-door-open"></i> Welcome to BRIT Award Talent Show</h1>
	<p>1. For <b>new customer</b>, please register first to make a booking</p>
	<p>2. For <b>existing customer</b>, please login to view your booking</p>
	<p>3. For <b>admin</b>, please login to manage booking informations</p>';
} // End of the function definition.

$page_title = 'Welcome to this Site!';
include ('includes/header1.html');

// Call the function:
create_menu();
//echo'<br><img src="includes/pic1.jpg" alt="CoronaVacation" width="760" height="290">';


include ('includes/footer.html');
?>