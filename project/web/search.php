<?php
if(isset($_POST['a']))
{
$s = $_POST['a']; 
if($s=="x")	
	header('Location: index.html');
else if($s=="mysore")
header('Location: search1.html');
else if($s=="man")
header('Location: search2.html');
else if($s=="ban")
header('Location: search3.html');
else if($s=="dhar")
header('Location: search4.html');	
}
?>