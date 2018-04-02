<!DOCTYPE html>
<html>
<head>
	<title>Nilai Mahasiswa</title>
</head>
<body>
<?php
	@$makul1 = $_POST['matakuliah1'];
	@$makul2 = $_POST['matakuliah2'];
	@$makul3 = $_POST['matakuliah3'];
	@$makul4 = $_POST['matakuliah4'];
	@$makul5 = $_POST['matakuliah5'];

	@$sks1 = $_POST['sks1'];
	@$sks2 = $_POST['sks2'];
	@$sks3 = $_POST['sks3'];
	@$sks4 = $_POST['sks4'];
	@$sks5 = $_POST['sks5'];

	@$anilai1 = $_POST['anilai1'];
	@$anilai2 = $_POST['anilai2'];
	@$anilai3 = $_POST['anilai3'];
	@$anilai4 = $_POST['anilai4'];
	@$anilai5 = $_POST['anilai5'];

	$sks = $sks1 + $sks2 + $sks3 + $sks4 + $sks5 ;

function konversi($a){
	$huruf = null;
	// var_dump($a);exit();
	if ($a <= 4 && $a > 3.71) {
		$huruf = "A";

	}
	elseif ($a <= 3.69 && $a > 3.31) {
		$huruf = "A-";
	}
	elseif ($a <= 3.30 && $a > 3.01) {
		$huruf = "B+";
	}
	elseif ($a <= 3.00 && $a > 2.71) {
		$huruf = "B";
	}
	elseif ($a <= 2.70 && $a > 2.30) {
		$huruf = "C+";
	}
	elseif ($a <= 2.29 && $a > 2.00) {
		$huruf = "C";
	}
	elseif ($a <= 2.00 && $a >  0.99) {
		$huruf = "D";
	}
	elseif ($a <=0.99){
		$huruf = "E";
	}
	return $huruf;
}
function hitung(){
	// $nilaiAkhir = $anilai1*$sks1 + $anilai2*$sks2 + $anilai3*$sks3 + $anilai4*$sks4 + $anilai5*$sks5 ;
	// $ipk = $nilaiAkhir / $sks;
	// return $ipk;
	$nilaiAkhir = $GLOBALS['anilai1']*$GLOBALS['sks1'] + $GLOBALS['anilai2']*$GLOBALS['sks2'] + $GLOBALS['anilai3']*$GLOBALS['sks3'] + $GLOBALS['anilai4']*$GLOBALS['sks4'] + $GLOBALS['anilai5']*$GLOBALS['sks5'] ;
	$ipk = $nilaiAkhir / $GLOBALS['sks'];
	return $ipk;
}	
?>
	<form name="input">
		<fieldset>
			<legend>Hasil Konversi Nilai Mata Kuliah 2017/2018</legend>
			<table>
				<th>Nama Mata Kuliah</th>
				<th>SKS</th>
				<th>Huruf</th>
				<tr>
					<td><?php echo $makul1; ?></td>
					<td><?php echo $sks1; ?></td>
					<td><?php echo konversi($anilai1); ?></td>
				</tr>
				<tr>
					<td><?php echo $makul2; ?></td>
					<td><?php echo $sks2 ?></td>
					<td><?php echo konversi($anilai2); ?></td>
				</tr>
				<tr>
					<td><?php echo $makul3 ?></td>
					<td><?php echo $sks3 ?></td>
					<td><?php echo konversi($anilai3); ?></td>
				</tr>
				<tr>
					<td><?php echo $makul4 ?></td>
					<td><?php echo $sks4 ?></td>
					<td><?php echo konversi($anilai4); ?></td>
				</tr>
				<tr>
					<td><?php echo $makul5 ?></td>
					<td><?php echo $sks5 ?></td>
					<td><?php echo konversi($anilai5); ?></td>
				</tr>
			</table>
			<div>
				Total SKS : <?php echo $sks ?><br>
				Indeks Prestasi Kumulatif (IPK) : <?php echo hitung(); ?>
			</div>
		</fieldset>
	</form>
</body>
</html>