
<?php
		 session_start();
    
	$uname=$_POST['log'];
	$password=$_POST['pass'];
	$_SESSION['uname']=$uname; 
	if($uname=="admin" && $password=="admin")
		header('Location: adminmenu.html');
	else 
		header('Location: login1.html');

	
   ?>
  