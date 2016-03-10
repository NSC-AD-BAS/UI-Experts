<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PRISM Organization List</title>
	<link rel="stylesheet" type="text/css" href="css/prism.css">
	<script type="text/javascript" src="js/tabValidator.js"></script>
</head>
<body onload="setHandlers()">
<header>
	<div id="topLeftHeader"></div>
	<div id="topRightHeader"></div>
	<div id="bottomHeader">
		<nav id="nav">
			<ul id="tabLinks">
				<li class="linksHidden" id="iTab"><a href="#" class="tabLink" id="1">Internships</a></li>
				<li class="linksHidden" id="oTab"><a href="#" class="tabLink" id="2">Organizations</a></li>
				<li class="linksHidden" id="fTab"><a href="#" class="tabLink" id="3">Faculty</a></li>
				<li class="linksHidden" id="sTab"><a href="#" class="tabLink" id="4">Students</a></li>
				<li class="nameType" id="tTab">Welcome to PRISM</li>
			</ul>
		</nav>
		<div id="logout">
			<a href="#" class="normalButton">Logout</a>
		</div>
	</div>
</header>
<div id="searchBar">
	<input type="text" id="mainSearch">
	<a href="#" title="searchLink" id="mainSearchButton"></a>
</div>
<div id="mainContent">
	<main>
<?php
$allOrgs = array();
$servername="localhost";
$username="root";
$password ="mysql";
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
//HERE LETS ALSO ADD EACH ORG ID TO A BRAND NEW ARRAY, WHICH WE CAN PASS TO THE ORGDETAILS
// PAGE SO THAT ON THAT PAGE, WE CAN HAVE A "PREVIOUS" AND "NEXT" LINK TO CLICK ON
$allOrgs[] = $row["OrganizationId"];
echo "<a href='orgDetails.php?orgId=$varName'>" .$row["OrganizationName"]. "</a>
-City: " .$row["City"]. "<br>";
}
}else{ 
echo "0 results";
}

mysqli_close($conn);
?>
	</main>
	<aside>
		<h2>dynamic profile content</h2>
		<a href="orgDetails.php?orgId=3">Click for organization view</a>
	</aside>
</div>
</body>
</html> 

