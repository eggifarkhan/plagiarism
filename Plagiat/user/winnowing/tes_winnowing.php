<?php

session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: pengguna.php");
}

?>

<?php
$kalimat1 = isset($_POST["kalimat1"])
    ? $_POST["kalimat1"]
    : "Indonesia Raya raya";
$kalimat2 = isset($_POST["kalimat2"])
    ? $_POST["kalimat2"]
    : "Indonesia Jaya Jaya";
$n = isset($_POST["n"]) ? $_POST["n"] : '5';
$window = isset($_POST["window"]) ? $_POST["window"] : '4';
$prima = isset($_POST["prima"]) ? $_POST["prima"] : '2';
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
                <a class="nav-link" href="../pengguna.php">
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
                        <a class="collapse-item" href="winnowing/winnowing.php">Winnowing</a>
                        <a class="collapse-item" href="../rabin/rabin.php">Rabin Karp</a>
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
                <a class="nav-link" href="../skripsi.php">
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
    <form method="POST">
        <p>Kalimat 1 : </p>
        <textarea name="kalimat1" disabled style="width :100%" rows="5"><?php echo $kalimat1; ?></textarea>
        <p>Kalimat 2 : </p>
        <textarea name="kalimat2"  style="width :100%" rows="5"><?php echo $kalimat2; ?></textarea>
        
        <p>N Gram : <input type ="text" name = "n" value = "<?php echo $n; ?>" ></p>
        <p>Window : <input type ="text" name = "window" value = "<?php echo $window; ?>" ></p>
        <p>Bilangan Prima :
            <select name = "prima">
<option>Pilih Salah Satu</option>

<?php for ($i = 2; $i < 100; $i++) {
    $hitung = 0;
    for ($j = 1; $j <= $i; $j++) {
        if ($i % $j == 0) {
            $hitung++;
        }
    }
    if ($hitung == 2) {
        $selected = "";
        if ($prima == $i) {
            $selected = " selected";
        }
        echo '<option value="' . $i . '" ' . $selected . ">" . $i . "</option>";
    }
} ?>
</select>
        </p>
        <p><input type=Submit value="Proses"></p>
    </form>
    <?php
if (!$_POST) {
    echo "</body>\n</html>";
    exit();
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
$s = "";
foreach ($w->GetNGramFirst() as $ng) {
    $s .= $ng . " ";
}
echo rtrim($s, " ");
?>
</textarea>
            </td>
            <td>
<textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$s = "";
foreach ($w->GetNGramSecond() as $ng) {
    $s .= $ng . " ";
}
echo rtrim($s, " ");
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
$s = "";
foreach ($w->GetRollingHashFirst() as $rl) {
    $s .= $rl . " ";
}
echo rtrim($s, " ");
?>
</textarea></td>
            <td><textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$s = "";
foreach ($w->GetRollingHashSecond() as $rl) {
    $s .= $rl . " ";
}
echo rtrim($s, " ");
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
for ($i = 0; $i < count($wd); $i++) {
    $s = "";
    for ($j = 0; $j < $window; $j++) {
        $s .= $wd[$i][$j] . " ";
    }
    echo "W-" . ($i + 1) . " : {" . rtrim($s, " ") . "}\n";
}
?>
</textarea></td>
            <td><textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$wd = $w->GetWindowSecond();
for ($i = 0; $i < count($wd); $i++) {
    $s = "";
    for ($j = 0; $j < $window; $j++) {
        $s .= $wd[$i][$j] . " ";
    }
    echo "W-" . ($i + 1) . " : {" . rtrim($s, " ") . "}\n";
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
$s = "";
foreach ($w->GetFingerprintsFirst() as $fp) {
    $s .= $fp . " ";
}
echo rtrim($s, " ");
?>
</textarea></td>
            <td><textarea style="width :100%;overflow-y:scroll;" rows="5">
<?php
$s = "";
foreach ($w->GetFingerprintsSecond() as $fp) {
    $s .= $fp . " ";
}
echo rtrim($s, " ");

$count_fingers1 = count($w->GetFingerprintsFirst());
$count_fingers2 = count($w->GetFingerprintsSecond());

$count_union_fingers = count(
    array_merge($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond())
);
$count_intersect_fingers = count(
    array_intersect($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond())
);
?>
</textarea>
            </td>
        </tr>
    </table>
    <p>Jumlah Fingerprints kalimat 1 =
        <?php echo $count_fingers1; ?>
    </p>
    <p>Jumlah Fingerprints kalimat 2 -
        <?php echo $count_fingers2; ?>
    </p>
    <p>Union (Gabungan) Fingerprints 1 dan 2 =
        <?php echo $count_union_fingers; ?>
    </p>
    <p>Intersection (fingerprints yang sama) =
        <?php echo $count_intersect_fingers; ?>
    </p>
    <p>(Union - Intersection) =
        <?php echo $count_union_fingers -
    $count_intersect_fingers; ?>
    </p>
    <p>Prosentase Plagiarisme </p>
    <p>&nbsp;&nbsp;Koefisien Jaccard = (Intersection / (Union-Intersection)) * 100 </p>
    <p>&nbsp;&nbsp;(
        <?php echo $count_intersect_fingers .
    "/" .
    ($count_union_fingers - $count_intersect_fingers) .
    ") * 100 = " .
    $w->GetJaccardCoefficient(); ?> %
    </p>
</body>

</html>

<?php
class winnowing {
	private $word1 = '';
	private $word2 = '';

	//input properties
	private $prime_number = 3;
	private $n_gram_value = 2;
	private $n_window_value = 4; 	
	
	//output properties
	private $arr_n_gram1;
	private $arr_n_gram2;
	private $arr_rolling_hash1;
	private $arr_rolling_hash2;
	private $arr_window1;
	private $arr_window2;
	private $arr_fingerprints1;
	private $arr_fingerprints2;

	public function SetPrimeNumber($value){
		$this->prime_number = $value;
	}	
	public function SetNGramValue($value){
		$this->n_gram_value = $value;
	}
	public function SetNWindowValue($value){
		$this->n_window_value = $value;
	}
	public function GetNGramFirst(){
		return $this->arr_n_gram1;
	}
	public function GetNGramSecond(){
		return $this->arr_n_gram2;
	}
	public function GetRollingHashFirst(){
		return $this->arr_rolling_hash1;
	}
	public function GetRollingHashSecond(){
		return $this->arr_rolling_hash2;
	}
	public function GetWindowFirst(){
		return $this->arr_window1;
	}
	public function GetWindowSecond(){
		return $this->arr_window2;
	}
	public function GetFingerprintsFirst(){
		return $this->arr_fingerprints1;
	}
	public function GetFingerprintsSecond(){
		return $this->arr_fingerprints2;
	}
	public function GetJaccardCoefficient($prosen = true){
		if($prosen)
			return round( ($this->jaccard_coefficient * 100), 2);
		else
			return $this->jaccard_coefficient;
	}

	function __construct($w1, $w2){
		$this->word1 = $w1;
		$this->word2 = $w2;
	}

	public function process(){
		if (($this->word1 == '') || ($this->word2 == '')) exit;

		//langkah 1 : buang semua huruf yang bukan kelompok [a-z A-Z 0-9] dan ubah menjadi huruf kecil semua (lowercase)
		$this->word1 = strtolower(str_replace(' ','',preg_replace("/[^a-zA-Z0-9\s-]/", "", $this->word1)));
		$this->word2 = strtolower(str_replace(' ','',preg_replace("/[^a-zA-Z0-9\s-]/", "", $this->word2)));

		//langkah 2 : buat N-Gram
		$this->arr_n_gram1 = $this->n_gram($this->word1, $this->n_gram_value);
		$this->arr_n_gram2 = $this->n_gram($this->word2, $this->n_gram_value);

		//langkah 3 : rolling hash untuk masing-masing n gram
		$this->arr_rolling_hash1 = $this->rolling_hash($this->arr_n_gram1);
		$this->arr_rolling_hash2 = $this->rolling_hash($this->arr_n_gram2);

		//langkah 4 : buat windowing untuk masing-masing tabel hash
		$this->arr_window1 = $this->windowing($this->arr_rolling_hash1, $this->n_window_value);
		$this->arr_window2 = $this->windowing($this->arr_rolling_hash2, $this->n_window_value);

		//langkah 5 : cari nilai minimum masing-masing window table (fingerprints)
		$this->arr_fingerprints1 = $this->fingerprints($this->arr_window1);
		$this->arr_fingerprints2 = $this->fingerprints($this->arr_window2);

		//langkah 6 : hitung koefisien plagiarisme memanfaatkan persamaan Jaccard Coefficient 
		$this->jaccard_coefficient = $this->jaccard_coefficient($this->arr_fingerprints1, $this->arr_fingerprints2);
	}

	private function n_gram($word, $n) {
		$ngrams = array();
		$length = strlen($word);
		for($i = 0; $i < $length; $i++) {
		        if($i > ($n - 2)) {
		                $ng = '';
		                for($j = $n-1; $j >= 0; $j--) {
		                        $ng .= $word[$i-$j];
		                }
		                $ngrams[] = $ng;
		        }
		}
		return $ngrams;
	}

	private function char2hash($string) {
		if (strlen($string) == 1) {
			return ord($string);
		} else {
			$result = 0;
			$length = strlen($string);
			for ($i = 0; $i < $length; $i++) {
				$result += ord(substr($string, $i, 1)) * pow($this->prime_number, $length-$i);
			}
			return $result;
		}
	}

	private function rolling_hash($ngram){
		$roll_hash = array();	
		foreach($ngram as $ng){
			$roll_hash[] = $this->char2hash($ng);
		}
		return $roll_hash;
	}

	private function windowing($rolling_hash, $n){
		$ngram = array();
		$length = count($rolling_hash);
		$x = 0;	
		for($i = 0; $i < $length; $i++){
			if($i > ($n - 2)) {
				$ngram[$x] = array();
				$y = 0;
				for($j = $n-1; $j >= 0; $j--){
					$ngram[$x][$y] = $rolling_hash[$i-$j]; 
					$y++;
				}
				$x++;
			}
		}
		//echo $x.' '.$y;
		return $ngram;
	}

	private function fingerprints($window_table){
		$fingers = array();	
		for($i = 0; $i < count($window_table); $i++){
			$min = $window_table[$i][0];
			for($j = 1 ; $j < $this->n_window_value; $j++){
				if($min > $window_table[$i][$j])
					$min = $window_table[$i][$j];
			}
			$fingers[] = $min;
		}
		return $fingers;	
	}

	private function jaccard_coefficient($fingerprint1, $fingerprint2){
		$arr_intersect = array_intersect( $fingerprint1, $fingerprint2 );
		$arr_union = array_merge( $fingerprint1, $fingerprint2 );
	
		$count_intersect_fingers = count($arr_intersect);
		$count_union_fingers = count( $arr_union );

		$coefficient = $count_intersect_fingers / 
			($count_union_fingers - $count_intersect_fingers );
		
		return $coefficient;
	}
}
?>
</div>

            <!-- End of Main Content -->
</div>
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
