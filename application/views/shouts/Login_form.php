<html>


<?php


	if(isset($this->session->userdata['logged_in']))
	{


		//load the login method

		header("location: http://localhost/shout/index.php/user_authenticate/user_login_process");

	}
?>
<head>
<title>User Login Form </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style1.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>


<?php

//check if he is logged out
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>


<?php

//
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>

<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('user_authenticate/user_login_process'); ?>
<?php

//check if login has error
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />

<!--   user go register controller method !-->


<a href="<?php echo base_url() ?>index.php/user_authenticate/signup">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>




</html>