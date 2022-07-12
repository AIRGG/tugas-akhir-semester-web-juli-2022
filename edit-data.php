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
        header("location:list-data.php"); // maka pindah ke halaman siswa.php
    }
}
$sql = "SELECT * FROM tbl_news WHERE id=?";
$param = [$_GET['id']];
$q = show($sql, $param);
if (count($q) == 0) die('Data Not Found');
$q = $q[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data</h1>
        <a href="list-data.php">Back</a>
        <form action="" method="post">
            <input type="hidden" value="<?= $q['id'] ?>" name="id">
            <label for="">Author</label><br>
            <input type="text" value="<?= $q['author'] ?>" name="author"><br><br>
            <label for="">Judul</label><br>
            <input type="text" value="<?= $q['title'] ?>" name="judul"><br><br>
            <label for="">Linknya</label><br>
            <input type="text" value="<?= $q['url'] ?>" name="link"><br><br>
            <!-- <label for="">Url Gambar</label><br>
            <input type="text" value="<?= $q['urlToImage'] ?>" name="urlimg"><br><br>
            <label for="">Tanggal</label><br>
            <input type="text" value="<?= $q['publishedAt'] ?>" name="tgl"><br><br> -->
            <input class="btn btn-primary" type="submit" name="save" value="Save">
        </form>
    </div>
</body>
</html>