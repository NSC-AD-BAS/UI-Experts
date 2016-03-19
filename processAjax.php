<?php
// This is a test. Ajax will be requesting information from the actual server php
//      files with there corresponding functions.
$req=$_GET["value"];
if($req == "iTab") {
    $arr = array('names' => 'Amazon', 'last' => 'SDE1 position', 'address' => '123 test run');
    echo json_encode($arr);
}
else if($req == "oTab") {
    $arr = array('names' => 'elton', 'last' => 'lee', 'address' => 'none');
    echo json_encode($arr);
}
else if($req == "fTab") {
    $arr = array('names' => 'aldus', 'last' => 'ling', 'address' => 'none');
    echo json_encode($arr);
}
else if($req == "sTab") {
    $arr = array('names' => 'andon', 'last' => 'lang', 'address' => 'none');
    echo json_encode($arr);
}
else if($req == 'eTab') {
    $arr = array('names' => 'aldon', 'last' => 'long', 'address' => 'none');
    echo json_encode($arr);
}
else {
    $arr = array('names' => 'stupid', 'dumb' => 'lee', 'address' => 'none');
    echo json_encode($arr);
}
?>