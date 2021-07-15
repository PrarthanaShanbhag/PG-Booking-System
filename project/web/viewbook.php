<?php
   
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
    
        $sql="select u.uname,b.bid,p.pgname,p.oid from user u,booking b,pg p where p.pid=b.pgid and u.uid=b.uid ";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        echo "NO BOOKING.......";
        else
       {
           ?>


           <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Result</title>

</head>

<body background="e.jpg">
<center>
<caption><H1>BOOKINGS</H1></caption>
<font color="white">
  <table width="483" height="96" border="5">
    <tr>
      <th width="150">Username</td>
      <th width="67">Booking Id</td>
      <th width="97">Pg name</td>
      <th width="71">Owner Id</td>
 
    </tr>
    <tr>

           <?php
        while($row=mysqli_fetch_assoc($result))
        {
           

  echo "<tr>";
  echo "<td>&nbsp;" . $row['uname'] . "</td>";
  echo "<td>&nbsp;" . $row['bid'] . "</td>";
  echo "<td>&nbsp;" . $row['pgname'] . "</td>";
  echo "<td>&nbsp;" . $row['oid'] . "</td>";
  
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