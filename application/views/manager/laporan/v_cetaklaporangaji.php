<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Gaji</title>
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
		<h2>Daftar Gaji Karyawan</h2>
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
				<th>Gaji Dasar</th>
				<th>Tj Dasar</th>
				<th>Tj Jabatan</th>
				<th>Tj Operasional</th>
				<th>Tj Biaya Perumahan</th>
				<th>Gross</th>
				<th>Iuaran BPJS</th>
				<th>Potongan</th>                            
				<th>THP</th>
			</tr>
        </thead>			
		<tbody>
			<?php foreach ($potongan as $p)  {
			 $pot_telat = $potongan[0]->jumlah_potongan;
			 $pot_alpha = $potongan[1]->jumlah_potongan;
			 
			} ?>
			<?php $no= 1 ; $total = 0 ;foreach($cetakgaji as $g) : {?>
				<?php $pot_gaji1 = $g->telat * $pot_telat ?>
				<?php $pot_gaji2=  $g->alpha * $pot_alpha ?>
				<?php $pot_gaji=  $pot_gaji1 + $pot_gaji2 ?>

				<?php $iuran_bpjs = $g->total_tagihan - $g->iuran_perusahaan ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $g->nik ?></td>
				<td><?php echo $g->nama_karyawan ?></td>
				<td><?php echo $g->nama_jabatan ?></td>
				<td>Rp. <?php echo number_format($g->gaji_dasar,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($g->tj_dasar,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($g->tj_jabatan,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($g->tj_operasional,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($g->tj_biaya_perumahan,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan + $g->tj_operasional + $g->tj_biaya_perumahan,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($iuran_bpjs,0,',','.') ?>
				<td>Rp. <?php echo number_format($pot_gaji,0,',','.') ?></td>
				<td>Rp. <?php echo number_format($g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan + $g->tj_operasional + $g->tj_biaya_perumahan - $pot_gaji - $iuran_bpjs,0,',','.') ?></td> 
            </tr>

			<?php $total = $total + $total_gaji =$g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan + $g->tj_operasional + 
			$g->tj_biaya_perumahan - $pot_gaji - $iuran_bpjs ?>

			<?php } ?> 
			<?php endforeach ;?>   	

        </tbody>
		</tbody>
		<tfoot>
			<td align="center" colspan="12"><b>Total Pengeluran Gaji Bulan ini</b></td>
			<td><b>Rp. <?php echo number_format($total)?></b></td>
		</tfoot>
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