
<!DOCTYPE html>
<html>
<head>
<title>login</title>
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
		<font color="white">
		 <?php
		 session_start();
    
	$uname=$_POST['log'];
	$password=$_POST['pass'];
	$_SESSION['uname']=$uname; 
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
        $sql="select uid from user where logid='$uname' and pass='$password'  ;";
		$result=mysqli_query($conn,$sql);
		
	   if(!$result)
		header('location:login2.html');	
        else
        {
            while($row=mysqli_fetch_assoc($result))
        {
            if($row['uid'])
                        header('location:usermenu.html');     
        }

        }
	}
	?>
	<br><br><br><br><h1>Incorrect uname or password</h1>
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