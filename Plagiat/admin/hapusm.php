<?php
include "config.php";
    $id = $_GET['id_user'];
    $ambil = mysqli_query($conn,"DELETE FROM user WHERE id_user='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/plagiarism/plagiat/admin/mahasiswa.php'>";
?>