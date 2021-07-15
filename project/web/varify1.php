

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="REG" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />

<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

</head>
<body>
<div class="video"> 
	<div class="center-container">
	    <div class="w3ls-agileinfo">
			<h1> Registration Form </h1>	
		</div>
		<font color="white">
		 <?php
		 session_start();
     $id=$_POST['id'];
   $oname=$_POST['name'];
     $add=$_POST['address'];
   $email=$_POST['email'];
      $phone=$_POST['phone'];
	//  echo "$email";
	        $gender=$_POST['gender'];
	        $login=$_POST['log'];
	  $_SESSION['id']=$id; 
   $password=$_POST['pass'];
   $cpass=$_POST['cpass'];
   //echo $uname." ".$email." ".$password." ".$cpassword;
   if($password!=$cpass){
   print "<br/><br/><h1>Password Not Matched</h1>";
   }
   else
   {
    $hostname="localhost";
    $username="root";
    $pass="";
    $dbname="hpe";
    $conn=mysqli_connect($hostname,$username,$pass,$dbname);
    if(!$conn)
    {
        mysqli_connect_error("<br/><h1>connection failed");
    }
    else
    {
		
        //$e=md5($pass);
        $sql="insert into owner(oid,oname,address,email,phone,gender,log,pass) values ('$id','$oname','$add','$email','$phone','$gender','$login','$password');";
		$result=mysqli_query($conn,$sql);
        if(!$result)
        echo "<br/><h1>Registration failed";
        else
        echo "<br/><h1>Successfully registered</h1>";
    }
   }
   ?>
   
   </font>
		<br>
		<br><br><br><br>
		 <div class="bg-agile">
			<div class="login-form">	
				<form action="index.html" method="post">
					<input type="submit" value="GO BACK TO HOME">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

  

</body>
</html>
   