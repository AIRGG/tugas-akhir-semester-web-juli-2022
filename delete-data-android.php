<?php
include('config/lib.php');
if (isset($_POST["delete"])) {
    $id_delete = $_POST['delete'];
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