<?php
include('config/lib.php');
$sql = "SELECT * FROM tbl_news";
$q = show($sql);
$myArray = array();
foreach($q as $row) {
    $myArray[] = $row;
}
echo json_encode($myArray);
?>