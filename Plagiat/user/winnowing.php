<?php

session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: pengguna.php");
}

?>
<?php
$kalimat1 = isset($_POST['kalimat1']) ? $_POST['kalimat1'] : 'Indonesia Raya'; 
$kalimat2 = isset($_POST['kalimat2']) ? $_POST['kalimat2'] : 'Indonesia Jaya'; 
$n = isset($_POST['n']) ? $_POST['n'] : 5;
$window = isset($_POST['window']) ? $_POST['window'] : 4;
$prima = isset($_POST['prima']) ? $_POST['prima'] : 2;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Winnowing</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="pengguna.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">STMIK<sup>Widuri</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="pengguna.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Algoritma</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilih Algoritma:</h6>
                        <a class="collapse-item" href="winnowing.php">Winnowing</a>
                        <a class="collapse-item" href="rabin.php">Rabin Karp</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="skripsi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Skripsi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                   <form method="POST" action="winnowing1.php">
<p>Kalimat 1 : </p>
<textarea name="kalimat1" style="width :100%" rows="5"><?php echo $kalimat1;?></textarea>
<p>Kalimat 2 : </p>
<textarea name="kalimat2" style="width :100%" rows="5"><?php echo $kalimat2;?></textarea>
<p>N Gram : <input type ="text" name = "n" value = "<?php echo $n;?>" ></p>
<p>Window : <input type ="text" name = "window" value = "<?php echo $window;?>" ></p>
<p>Bilangan Prima : 
<select name = "prima">
<option>Pilih Salah Satu</option>
<?php
for($i = 2; $i < 100; $i++){
    $hitung = 0;
    for($j = 1; $j <= $i; $j++){
        if(($i % $j) == 0) $hitung++;
    }
    if($hitung == 2) {
        $selected = ''; if($prima == $i) $selected = ' selected';
        echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
    }
}
?>
</select>
</p>
<p><input type=Submit value="Proses"></p>
</form>
<?php
if(!$_POST) {
    echo "</body>\n</html>";    
    exit;
}

$w = new winnowing($kalimat1, $kalimat2);
$w->SetPrimeNumber($prima);
$w->SetNGramValue($n);
$w->SetNWindowValue($window);

$w->Process();

?>
<h2>Hasil Proses</h2>
<table style="width : 100%;">
<tr>
<td>N-GRAM Kalimat 1</td>
<td>N-GRAM Kalimat 2</td>
</tr>
<tr>
<td>
<textarea style="width :100%; overflow-y:scroll;" rows="5">
<?php
$s =''; 
foreach($w->GetNGramFirst() as $ng){
    $s .= $ng.' ';
}
echo rtrim($s, ' ');
?>
</textarea>
</td>
<td>
<textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$s =''; 
foreach($w->GetNGramSecond() as $ng){
    $s .= $ng.' ';
}
echo rtrim($s, ' ');
?>
</textarea>
</td>
</tr>
<tr>
<td>Rolling Hash Kalimat 1</td>
<td>Rolling Hash Kalimat 2</td>
</tr>
<tr>
<td><textarea style="width :100%; overflow-y:scroll;" rows="5">
<?php
$s='';
foreach($w->GetRollingHashFirst() as $rl){
    $s .= $rl.' ';
}
echo rtrim($s, ' ');
?>
</textarea></td>
<td><textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$s='';
foreach($w->GetRollingHashSecond() as $rl){
    $s .= $rl.' ';
}
echo rtrim($s, ' ');
?>
</textarea></td>
</tr>
<tr>
<td>Window Kalimat 1</td>
<td>Window Kalimat 2</td>
</tr>
<tr>
<td><textarea style="width :100%; overflow-y:scroll;" rows="5">
<?php
$wd = $w->GetWindowFirst();
for($i = 0; $i< count($wd); $i++){
    $s = '';
    for($j=0; $j < $window; $j++){
        $s .= $wd[$i][$j]. ' ';
    }
    echo "W-".($i+1)." : {".rtrim($s, ' ')."}\n";
}
?>
</textarea></td>
<td><textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$wd = $w->GetWindowSecond();
for($i = 0; $i< count($wd); $i++){
    $s = '';
    for($j=0; $j < $window; $j++){
        $s .= $wd[$i][$j]. ' ';
    }
    echo "W-".($i+1)." : {".rtrim($s, ' ')."}\n";
}
?>
</textarea></td>
</tr>
<tr>
<td>Fingerprints Kalimat 1</td>
<td>Fingerprints Kalimat 2</td>
</tr>
<tr>
<td><textarea style="width :100%; overflow-y:scroll;" rows="5">
<?php
$s='';
foreach($w->GetFingerprintsFirst() as $fp){
    $s .= $fp.' ';
}
echo rtrim($s, ' ');
?>
</textarea></td>
<td><textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$s='';
foreach($w->GetFingerprintsSecond() as $fp){
    $s .= $fp.' ';
}
echo rtrim($s, ' ');

$count_fingers1 = count($w->GetFingerprintsFirst());
$count_fingers2 = count($w->GetFingerprintsSecond());

$count_union_fingers = count(array_merge($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond()));
$count_intersect_fingers = count(array_intersect($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond()));

?>
</textarea>
</td>
</tr>
</table>
<p>Jumlah Fingerprints kalimat 1 = <?php echo $count_fingers1;?></p>
<p>Jumlah Fingerprints kalimat 2 - <?php echo $count_fingers2;?></p>
<p>Union (Gabungan) Fingerprints 1 dan 2 = <?php echo $count_union_fingers;?></p>
<p>Intersection (fingerprints yang sama) = <?php echo $count_intersect_fingers;?></p>
<p>(Union - Intersection) = <?php echo ($count_union_fingers - $count_intersect_fingers);?></p>
<p>Prosentase Plagiarisme </p>
<p>&nbsp;&nbsp;Koefisien Jaccard = (Intersection / (Union-Intersection)) * 100 </p>
<p>&nbsp;&nbsp;(<?php echo $count_intersect_fingers ."/".($count_union_fingers - $count_intersect_fingers).") * 100 = ".$w->GetJaccardCoefficient();?> %</p>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika ingin keluar!!!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>