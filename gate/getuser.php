<!DOCTYPE html>
<html>

<head>
</head>
<body>

  <?php
     $q = intval($_GET['q']);
     
     $con = mysqli_connect('hebeixiubiaocom.ipagemysql.com','bingguo','Bigbang0105^','mydb1');
     if (!$con) {
     die('Could not connect: ' . mysqli_error($con));
     }
     
     mysqli_select_db($con,"ajax_demo");
     switch($q) {
     case "1":
     $sql="SELECT * FROM CETUP";
     case "2":
     $sql="SELECT * FROM CETUP WHERE go_int = 1 ";
     case "3":
     $sql="SELECT * FROM CETUP WHERE go_int = 0 ";
     case "4":
     $sql="SELECT * FROM CETUP WHERE go_int = 2 ";
     
     }
    
     $result = mysqli_query($con,$sql);
     
     echo "
	   
	   <table class='table table-hover'>
	     <thead>
	       <tr>
		 <th>Name</th>
		 <th>Email</th>
		 <th>Institution</th>
		 <th>Position</th>
		 <th>Attend?</th>
		 <th>Registered?</th>
		 <th>Request for fund</th>
		 <th>Talk</th>
	       </tr>
	     </thead>
	     <tbody> ";
	       
	       while($row = mysqli_fetch_array($result)) {
	       echo "<tr>";
		 echo "<td>" . $row['name'] . "</td>";
		 echo "<td>" . $row['email'] . "</td>";
		 echo "<td>" . $row['institution'] . "</td>";
		 echo "<td>" . $row['position'] . "</td>";
		 echo "<td>" . $row['go?'] . "</td>";
		 echo "<td>" . $row['registered?'] . "</td>";
		 echo "<td>" . $row['request_for_fund'] . "</td>";
		 echo "<td>" . $row['talk'] . "</td>";
		 echo "</tr>";
	       }
	       echo " </tbody>
	   </table>";
	   mysqli_close($con);
	   ?>
</body>
</html>
