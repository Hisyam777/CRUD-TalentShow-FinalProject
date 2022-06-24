<?php 
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';
include ('includes/header1.html');

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}

// Display the form:
	
?>

<div class="container p-2 bg-dark text-white col-11">	<!-- Start of the page-specific content. -->
	<div class="row">
		<div class="col-xl-8">
			<h1 class="col-xl-8"><i class="fas fa-users-cog"></i> Admin Login</h1>
<br>
<form action="login_admin.php" method="post">


	<div class=" col-xl-8">
    <label >Username</label>
    <input type="text" class="form-control  " name="username"  placeholder="Enter username" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
 	</div>

  <div class=" col-xl-8">
    <label >Password</label>
    <input type="password" class="form-control " name="password"  placeholder="Enter password" required>
  </div>

	<!--<p>Username: <input type="text" name="username" size="20" maxlength="60" required/> -->
	<!--<p>Password: <input type="password" name="password" size="20" maxlength="20" required/></p> -->
	<br>
	<div class="form-group  mx-sm-3">
	<button type="submit" class="btn btn-lg btn-primary ">Login</button>
	</div>

</div>
</div>

</div>

</form>


<?php include ('includes/footer.html'); ?>