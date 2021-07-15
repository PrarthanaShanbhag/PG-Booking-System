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
    
        $sql="select loc_id,loc_name from location; ";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        echo "NO LOCATION.......";
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
<caption><H1><U>LOCATIONS</U></H1></caption>
<font color="white">
  <table width="483" height="96" border="5">
    <tr>
      <th width="67" height="60"><center>LOCATION ID</center></td>
      <th width="67" height="60"><center>LOCATION NAME</center></td>
      
 
    </tr>
    <tr>

           <?php
        while($row=mysqli_fetch_assoc($result))
        {
           

  echo "<tr>";
  echo "<td>&nbsp;<center>" . $row['loc_id'] . "</center></td>";
  echo "<td>&nbsp;<center>" . $row['loc_name'] . "</center></td>";
  
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