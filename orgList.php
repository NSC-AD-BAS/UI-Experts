<!DOCTYPE html>
<html>
 <head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

	<div id="menu">
	<ul>
	<li><a href="index.html">Home</a></li>
	<li><a href="students.html">Students</a></li>
	<li><a href="organizations.html">Organizations</a></li>
	<li><a href="sysman.html">System Management</a></li>
	<li><a href="logout.html">Log Out</a></li>
	</ul>
	</div>


<div id="data">

<?php
$servername="localhost";
$username="root";
$password ="sesame";
$dbname="prism";
$rec_limit = 10;

//create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
//check connection
if (!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
$sql ="SELECT OrganizationId, OrganizationName, NumOfEmployees, City  FROM organizations";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

//output data of each row
while($row= mysqli_fetch_assoc($result)){
$varName=$row["OrganizationId"];

echo "<a href='orgDetailsView.php?orgId=$varName'>" .$row["OrganizationName"]. "</a> 
-Employee #: " .$row["NumOfEmployees"]. " -City: " .$row["City"]. "<br>";
}
}else{ 
echo "0 results";
}

mysqli_close($conn);
?>

</div>
</body>
</html> 

