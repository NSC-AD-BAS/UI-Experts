<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/prism.css">
	<script type="text/javascript" src="js/tabValidator.js"></script>
    <script type="text/javascript" src="js/httpRequest.js"></script>
    <title>Organization Details</title>
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
		$id=$_GET['orgId'];
		if(is_numeric($id) && $id > 0 && $id == round($id, 0)) {
			//echo "<div id=\"orgIdElement\" style=\"display:none;\">$id</div>";
			//echo "<p>id is: $id</p>";

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
			$sql ="SELECT * FROM organizations WHERE organizationId EQUALS $id";

			$result=mysqli_query($conn,$sql);
			echo "<p>$result</p>";
		} else {
			echo "<p>Error, invalid organization id</p>";
		}
		?>
		<p>test</p>
	</main>
	<aside>
		<h2>dynamic profile content</h2>
	</aside>
</div>
</body>
</html>