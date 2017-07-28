<?php
	



    if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: shout/Login_form");
}



$this->load->view('/header');

if ($this->session->flashdata('success')) {
  echo '<p class="success">'.$this->session->flashdata('success').'</p>';
}
 
echo validation_errors('<p class="error">', '</p>');


if($shouts)
{
	echo '<ul>';
	foreach ($shouts as $shout) {
		# code...
		$gravatar = 'http://www.gravatar.com/avatar?gravatar_id=' . md5(strtolower($shout->email)) . '&size=70';
		?>
		<li>
		 <div class="meta">
      <img src="<?= $gravatar ?>" alt="Gravatar" />
      <p><?= $shout->name ?></p>
    </div>
    <div class="shout">
      <p><?= $shout->message ?></p>
    </div>
  </li>



		<?php 
   
	}
}
	
else 
{
	echo'<p class=error">No Shouts Found !</p>';

}


echo form_open('shouts_controller/create'); ?>

<h2>Shouts  </h2>

<div class="fname">
    <label for="name"><p>Name:</p></label>
    
    <?= $username ?>

    </div>
 
  <div class="femail">
    <label for="email"><p>Email:</p></label>
   <?= $email ?>

  </div>




   <textarea name="message" rows="5" cols="40" > <?php  echo set_value('shout') ?>
    </textarea>
 	
  <p><input type="submit" value="Submit" /></p>

   <?php
echo form_close();
$this->load->view('/footer');

?>





