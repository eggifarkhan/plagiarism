<?php
include "config.php";
    $id = $_GET['id_skripsi'];
    $ambil = mysqli_query($conn,"DELETE FROM data_skripsi WHERE id_skripsi='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/plagiarism/plagiat/admin/skripsi.php'>";
?>