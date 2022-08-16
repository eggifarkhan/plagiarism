<?php
$kalimat1 = isset($_POST['kalimat1']) ? $_POST['kalimat1'] : 'Indonesia Raya'; 
$kalimat2 = isset($_POST['kalimat2']) ? $_POST['kalimat2'] : 'Indonesia Jaya'; 
$n = isset($_POST['n']) ? $_POST['n'] : 5;
$window = isset($_POST['window']) ? $_POST['window'] : 4;
$prima = isset($_POST['prima']) ? $_POST['prima'] : 2;

?>
<html>
<head>
<title>Deteksi Plagiarisme Memanfaatkan Algoritma Winnowing</title>
</head>
<body>
<form method="POST" action="winnowing.php">
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
</body>
</html>