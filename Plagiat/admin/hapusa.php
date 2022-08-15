<?php
include "config.php";
    $id = $_GET['id_admin'];
    $ambil = mysqli_query($conn,"DELETE FROM admin WHERE id_admin='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/plagiarism/plagiat/admin/admin.php'>";
?>