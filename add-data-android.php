<?php
include('config/lib.php');
if (isset($_POST["save"])) {
    $form_author = $_POST['author'];
    $form_judul = $_POST['judul'];
    $form_link = $_POST['link'];
    $form_urlimg = $_POST['urlimg'];
    $form_tgl = $_POST['tgl'];
    
    // sesuain
    $sql = "INSERT INTO `tbl_news`(`author`, `title`, `url`, `urlToImage`, `publishedAt`) VALUES (?,?,?,?,?)";
    $param = [$form_author, $form_judul, $form_link, $form_urlimg, $form_tgl];
    
    $q = proses($sql, $param);
    if ($q) { // jika berhasil di eksekusi
        // header("location:list-data.php"); // maka pindah ke halaman siswa.php
        $resp = ['respon' => 'ok'];
        echo json_encode($resp);
    }
}
?>