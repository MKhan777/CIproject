



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">



<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: SignUpForm");
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SHOUTBOX BY MKHAN777</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
</head>
<body>
<div id="container">
 


  <h1>Shoutbox</h1>
 


  <h5>
    <a href="http://www.walqalum.me" title="Muhammad Talha Khan">Muhammad Talha Khan </a>
  </h5>
 <div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $username;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>
<b id="logout"><a href="logout">Logout</a></b>
</div>
<br/>


  <div id="boxtop"></div>
  <div id="content">