<?php
include('config/lib.php');
if (isset($_POST["save"])) {
    $form_author = $_POST['author'];
    $form_judul = $_POST['judul'];
    $form_link = $_POST['link'];
    // $form_urlimg = $_POST['urlimg'];
    $form_urlimg = 'https://picsum.photos/400/300?t'.strval(date("YmdHis"));
    // $form_tgl = $_POST['tgl'];
    $date   = new DateTime(); //this returns the current date time
    $form_tgl = $date->format('Y-m-d');
    $form_id = $_POST['id'];
    
    // sesuain
    $sql = "UPDATE `tbl_news` SET `author`=?,`title`=?,`url`=?,`urlToImage`=?,`publishedAt`=? WHERE id=?";
    $param = [$form_author, $form_judul, $form_link, $form_urlimg, $form_tgl, $form_id];
    
    $q = proses($sql, $param);
    if ($q) { // jika berhasil di eksekusi
        // header("location:list-data.php"); // maka pindah ke halaman siswa.php
        $resp = ['respon' => 'ok'];
        echo json_encode($resp);
        die();
    }
}
$sql = "SELECT * FROM tbl_news WHERE id=?";
$param = [$_GET['id']];
$q = show($sql, $param);
if (count($q) == 0) die(json_encode(['respon' => 'Not Found']));
$q = $q[0];
echo json_encode($q);
?>