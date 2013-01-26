<?php
	$web_user = false;
	if ($content_xml->web_user) {
		$web_user = true;
	}
?>

<?php # The form action must be the section URL + /login/confirm ?>
<form method="post" name="form1" enctype="multipart/form-data" action="/members/login/confirm">
    <h2 class="login_title">Member login</h2>
	<?php
		# Key off our $web_user variable to determine if a logged in user is on the site.
			# If logged in, display a logout button with name="signout_button" required.
		if ($web_user) {
	?>
		<input type="submit" name="signout_button" value="Log Out" class="login" />
	<?php
		} else {
		# If a user is not currently logged in, display username, password, and submit fields
			# name="signin_username", name="signin_password", name="signin_button" required respectively
	?>
	    <label>Username: <input name="signin_username" value="" /></label>
	    <label>Password:  <input type="password" name="signin_password" /></label>
	    <input type="submit" name="signin_button" value="Login" class="login" />
	<?php		
		}
	?>
</form>
