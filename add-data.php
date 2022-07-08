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
        header("location:list-data.php"); // maka pindah ke halaman siswa.php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
</head>
<body>
    <h1>Add Data</h1>
    <a href="list-data.php">Back</a>
    <form action="" method="post">
        <label for="">Author</label><br>
        <input type="text" name="author"><br><br>
        <label for="">Judul</label><br>
        <input type="text" name="judul"><br><br>
        <label for="">Linknya</label><br>
        <input type="text" name="link"><br><br>
        <label for="">Url Gambar</label><br>
        <input type="text" name="urlimg"><br><br>
        <label for="">Tanggal</label><br>
        <input type="text" name="tgl"><br><br>
        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>