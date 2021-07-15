<?php
   $loc=$_POST['loc'];
      $pt=$_POST['pt'];

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
    
        $sql="select p.pid,p.pgname,p.rent,p.pgtype from pg p,location l where l.loc_name='$loc' and p.loc_id=l.loc_id and p.pgtype='$pt' ; ";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        echo "NO PGS.......";
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

<body background="e.jpg">
<center>
<caption><H1>PGS</H1></caption>
<?php
  echo "<td><h4>PG Type:&nbsp;" . $row['pgtype'] . "</h4></td>";?>
  <table width="483" height="96" border="5">
    <tr>
      <th width="150"> PG ID</td>
      <th width="67"> PG NAME</td>
      <th width="97">RENT</td> 
    </tr>
    <tr>

           <?php
        

  echo "<tr>";
  echo "<td>&nbsp;" . $row['pid'] . "</td>";
  echo "<td>&nbsp;" . $row['pgname'] . "</td>";
  echo "<td>&nbsp;" . $row['rent'] . "</td>";
  
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