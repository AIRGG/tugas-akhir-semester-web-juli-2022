<?php
include('config/lib.php');
if (isset($_GET["delete"])) {
    $id_delete = $_GET['delete'];
    $sql = "DELETE FROM `tbl_news` WHERE id=?";
    $param = [$id_delete];
    $q = proses($sql, $param);
    if($q) {
        // header('location:list-data.php');
        $resp = ['respon' => 'ok'];
        echo json_encode($resp);
    }
}
?>