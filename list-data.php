<?php
include('config/lib.php');
if (isset($_GET["delete"])) {
    $id_delete = $_GET['delete'];
    $sql = "DELETE FROM `tbl_news` WHERE id=?";
    $param = [$id_delete];
    $q = proses($sql, $param);
    if($q) {
        header('location:list-data.php');
    }
}
$sql = "SELECT * FROM tbl_news";
$q = show($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tag meta identitas page -->
    <title>Adblock - Extension for Browser</title>

    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <h1>List Data</h1>
    <a href="add-data.php">Tambah Data</a>
    <br><br>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <td>No</td>
            <td>Nama</td>
            <td>Deskripsi</td>
            <td>Action</td>
        </thead>
        <tbody>

            <?php
            foreach($q as $data => $v):
            ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['author'] ?></td>
                <td><?= $v['title'] ?></td>
                <td>
                    <a href="#">Detail</a>
                    <a href="edit-data.php?id=<?= $v['id'] ?>">Edit</a>
                    <a href="?delete=<?= $v['id'] ?>" onclick="return confirm('Yakin?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>

            <!-- <tr>
                <td>2</td>
                <td>Asep</td>
                <td>Orang</td>
                <td>
                    <a href="#">Detail</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr> -->
        </tbody>
    </table>
</body>

</html>