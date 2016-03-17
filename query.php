
<!DOCTYPE html>
<html>
 <head>

  
<link rel="stylesheet" type="text/css" href="newOrgView.css" >
</head>

<body>
 
	<div id="menu">
	<ul>
	<li><a href="index.asp">Home</a></li>
	<li><a href="students.asp">Students</a></li>
	<li><a href="organizations.asp">Organizations</a></li>
	<li><a href="sysman.asp">System Management</a></li>
	<li><a href="logout.asp">Log Out</a></li>
	</ul>
	</div>




<div id="data">
<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "prism";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
die("connection failed: ".mysqli_connect_error());
}

$sql = "SELECT *  from org_detail";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
#start td here
while($row = mysqli_fetch_assoc($result)) {
echo "<div>Company: " . $row["Organization"] . "</div><br>";
echo "url: " . $row["URL"] . "<br>";
echo "Address: " . $row["Address 1"] . "<br>";
echo "Address 2: " . $row["Address 2"] . "<br>";
echo "city: " . $row["City"] . "<br>";
echo "state: " . $row["State"] . "<br>";
echo "Employee # : " . $row["Number of Employees"] . "<br>";
echo "Yearly Revenue: " . $row["Yearly Revenue"] . "<br>";
echo "Description : " . $row["Description"] . "<br>";
}
#end td 
} else {
echo "0 results";
}
mysqli_close($conn);
?>

</div>
</body>
</html>