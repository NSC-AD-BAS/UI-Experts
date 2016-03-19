<?php
//header("content-type:application/json");
$allOrgs = array();
$servername="localhost";
$username="root";
$password ="";
$dbname="prism";
$rec_limit = 10;
$counter = 0;
$jsonArray = array();
$ajaxReq = $_GET['value'];

//create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
//check connection
if (!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
if($ajaxReq == 'iTab') {
    $sql = "SELECT OrganizationId, PositionTitle FROM internships";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            $allOrgs[] = $row["OrganizationId"];
            $jsonArray[$counter]=$row["PositionTitle"];
            $counter++;
        }
    }
    else echo "no results";
}
elseif($ajaxReq == 'oTab') {
    $sql = "SELECT OrganizationId, OrganizationName FROM organizations";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            $allOrgs[] = $row["OrganizationId"];
            $jsonArray[$counter]=$row["OrganizationName"];
            $counter++;
        }
    }
}
elseif($ajaxReq == 'fTab') {
    $sql = "SELECT StudentId, UserId  FROM students";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            $allOrgs[] = $row["StudentId"];
            $jsonArray[$counter]=$row["UserId"];
            $counter++;
        }
    }
}
elseif($ajaxReq == 'sTab') {
    $sql = "SELECT StudentId, UserId  FROM students";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            $allOrgs[] = $row["StudentId"];
            $jsonArray[$counter]=$row["UserId"];
            $counter++;
        }
    }
}
elseif($ajaxReq == 'eTab') {
    $sql = "SELECT FirstName, LastName, UserName FROM users";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            $allOrgs[] = $row["UserName"];
            $jsonArray[] = $row["FirstName"." "."LastName"];
        }
    }
}
$ja = array_combine($allOrgs, $jsonArray);
echo json_encode($ja);
mysqli_close($conn);
?>