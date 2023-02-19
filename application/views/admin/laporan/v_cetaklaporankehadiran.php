<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Kehadiran</title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h1>CV. PERKASA TELKOMSELINDO</h1>
		<h2>Daftar Kehadiran Karyawan</h2>
	</center>

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
	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo $bulan?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo $tahun?></td>
		</tr>
	</table>
	<table class="table table-bordered table-triped">
        <thead>
			<tr class="text-center">
				<th>No</th>
				<th>NIK</th>
				<th>Nama Karyawan</th>
				<th>Jabatan</th>
				<th>Hadir</th>
				<th>Sakit</th>
				<th>Alpha</th>
				<th>Telat</th>
			</tr>
        </thead>			
		<tbody>
			<?php $no= 1 ; 
			foreach($kehadiran as $k )  {?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $k->nik ?></td>
					<td><?= $k->nama_karyawan ?></td>
					<td><?= $k->nama_jabatan ?></td>
					<td><?= $k->hadir?></td> 
					<td><?= $k->sakit?></td> 
					<td><?= $k->alpha?></td>
					<td><?= $k->telat?></td>                           
				</tr>
				<?php } ?>           	
        </tbody>
	</table>
						
		<table width="100%">
			<tr>
				<td></td>
				<td width="200px">
					<p>Demak, <?php echo date("d M Y") ?> <br> Finance</p>
					<br>
					<br>
					<p>_____________________</p>
				</td>
			</tr>
		</table>				
	
</body>
</html>

<script type="text/javascript">
	window.print();
</script>