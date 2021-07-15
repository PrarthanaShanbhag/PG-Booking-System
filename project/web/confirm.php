<?php
    $uid=$_POST['uid'];
	$bid=$_POST['bid'];
	$oid=$_POST['oid'];
    $hostname="localhost";
    $username="root";
    $pass="";
    $dbname="hpe";
    $conn=mysqli_connect($hostname,$username,$pass,$dbname);
    if(!$conn)
    {
        mysqli_connect_error("connection failed");
    }
    else
    {
    
        $sql="select u.uname,p.pgname,p.rent from user u,booking b,pg p where u.uid='$uid' and b.bid='$bid' and p.pid=b.pgid and u.uid=b.uid and p.oid='$oid'; ";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        echo "NO BOOKING.......";
        else
       {
		     
        while($row=mysqli_fetch_assoc($result))
        {
           ?>


           <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Result</title>

</head>

<body background="images/x.jpg">
<center>
<caption><H1><u>BOOKING CONFIRMED</u></H1></caption>
<font color="white" ><br><br>
  <table width="483" height="96" border="5" align="center">
    <tr>
      <th width="150">USER NAME:</th>

	    <?php
  
  echo "<td>&nbsp;" . $row['uname'] . "</td>";
  
	  ?>
	  </tr>
	  <tr>
      <th width="97">PG NAME :</th>
	  <?php
  echo "<td>&nbsp;" . $row['pgname'] . "</td>";
	  ?>
	  </tr>
	  <tr>
      <th width="71">RENT:</th>
	  <?php
  
echo "<td>&nbsp;" . $row['rent'] . " pm</td>";
  
	  ?>
 
    </tr>
  
        <?php
        }
        ?>
</table>
<?php
        }
    }
        ?>
		</center>
		
		
</body>
</html>