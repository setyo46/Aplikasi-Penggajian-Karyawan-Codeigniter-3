<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	
	<table width="40%">
		<tr>
			<td class="text-center">
				<center>
				<h2>CV. PERKASA TELKOMSELINDO</h2>
				<h2>Slip Gaji Karyawan</h2>
				<hr style="width: 95%; border-width: 5px; color: black">
				</center>
			</td>	
		</tr>
	</table>
	

	<?php
	if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	?>

	<?php foreach($potongan as $p) {
		$pot_telat = $potongan[0]->jumlah_potongan;
		$pot_alpha = $potongan[1]->jumlah_potongan;
	} ?>
	
	<?php foreach($slip_gaji as $sg) : ?>
		<?php $pot_gaji1 = $sg->telat * $pot_telat ?>
		<?php $pot_gaji2=  $sg->alpha * $pot_alpha ?>
		<?php $pot_gaji=  $pot_gaji1 + $pot_gaji2 ?>	
		
	<?php $iuran_bpjs = $sg->total_tagihan - $sg->iuran_perusahaan ?>

		<table style="width: 40%">
			<tr>
				<td width="20%">Nama Karyawan</td>
				<td width="2%">:</td>
				<td><?php echo $sg->nama_karyawan?></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td><?php echo $sg->nik?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $sg->nama_jabatan?></td>
			</tr>
			<tr>
				<td>Bulan</td>
				<td>:</td>
				<td><?php echo substr($sg->bulan, 0,2) ?></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><?php echo substr($sg->bulan, 2,4) ?></td>
			</tr>
		</table>

		<table class="table table-striped table-bordered mt-3" style="width: 40%">
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center" >Keterangan</th>
			<th class="text-center" >Jumlah</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Gaji Dasar</td>
			<td>Rp. <?php echo number_format($sg->gaji_dasar,0,',','.') ?></td>
		</tr>

		<tr>
			<td>2</td>
			<td>Tunjangan Dasar</td>
			<td>Rp. <?php echo number_format($sg->tj_dasar,0,',','.') ?></td>
		</tr>

		<tr>
			<td>3</td>
			<td>Tunjangan Jabatan</td>
			<td>Rp. <?php echo number_format($sg->tj_jabatan,0,',','.') ?></td>
		</tr>

		<tr>
			<td>4</td>
			<td>Tunjangan Operasional</td>
			<td>Rp. <?php echo number_format($sg->tj_operasional,0,',','.') ?></td>
		</tr>

		<tr>
			<td>4</td>
			<td>Tunjangan Biaya Perumahan</td>
			<td>Rp. <?php echo number_format($sg->tj_biaya_perumahan,0,',','.') ?></td>
		</tr>

		<tr>
			<td>5</td>
			<td>Gross</td>
			<td>Rp. <?php echo number_format($sg->gaji_dasar + $sg->tj_dasar + $sg->tj_jabatan + $sg->tj_operasional + $sg->tj_biaya_perumahan,0,',','.') ?></td>
		</tr>

		<tr>
			<td>6</td>
			<td>Iuran BPJS</td>
			<td>Rp. <?php echo number_format($iuran_bpjs,0,',','.') ?></td>
		</tr>

		<tr>
			<td>7</td>
			<td>Potongan</td>
			<td>Rp. <?php echo number_format($pot_gaji,0,',','.') ?></td>
		</tr>

		<tr>
			<td>8</td>
			<td>Keterangan</td>
			<td>Alpha : <?php echo $sg->alpha ?> Telat : <?php echo $sg->telat ?></td>
		</tr>

		
		<tr>
			<th colspan="2" style="text-align: right;">THP : </th>
			<th>Rp. <?php echo number_format($sg->gaji_dasar + $sg->tj_dasar + $sg->tj_jabatan + 
				 $sg->tj_operasional + $sg->tj_biaya_perumahan - $pot_gaji - $iuran_bpjs,0,',','.') ?></th>
		</tr>
	</table>
	
	
	<table width="40%">
		<tr>
			<td></td>
			<td>
				<p>Karyawan</p>
				<br>
				<br>
				<p class="font-weight-bold"><?php echo $sg->nama_karyawan?></p>
			</td>

			<td width="200px">
				<p>Demak, <?php echo date("d M Y")?> <br> Finance,</p>
				<br>
				<br>
				<p>___________________</p>
			</td>
		</tr>
	</table>
	

	<?php endforeach ;?>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>