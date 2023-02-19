<?php 
        // atur tanggal
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!=''))
        {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?> 

<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card mx-auto" style="width: 38%">
		<div class="card-header bg-primary text-white text-center">
			FIlter Slip Gaji Karyawan
		</div>

		<form method="POST" action="<?php echo base_url('admin/slipgaji/cetak_slipgaji')?>">
		<div class="card-body">
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
				<div class="col-sm-9">
					<select class="form-control" name="bulan">
					    <option value=""> Pilih Bulan </option>
					    <option value="01">Januari</option>
					    <option value="02">Februari</option>
					    <option value="03">Maret</option>
					    <option value="04">April</option>
					    <option value="05">Mei</option>
					    <option value="06">Juni</option>
					    <option value="07">Juli</option>
					    <option value="08">Agustus</option>
					    <option value="09">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
				    </select>
				</div>
			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
				<div class="col-sm-9">
					<select class="form-control" name="tahun">
					    <option value=""> Pilih Tahun </option>
					    <?php $tahun = date('Y');
					    for($i=2022;$i<$tahun+5;$i++) { ?>
					    <option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php }?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Nama Karyawan</label>
				<div class="col-sm-9">
					<select class="form-control" name="nama_karyawan">
					    <option value=""> Pilih Karyawan </option>
					    <?php foreach($karyawan as $k) : ?>
					    	<option value="<?php echo $k->nama_karyawan ?>"><?php echo $k->nama_karyawan ?></option>
					    <?php endforeach; ?>
					</select>
				</div>
			</div>

			<button style="width: 100%" type="submit" class="btn btn-primary"><i class="fas fa-print"></i>Cetak Slip Gaji</button>
	</div>
	</form>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data kehadiran masih kosong, silahkan input absensi terlebih dahulu pada bulan dan tahun yang Anda pilih.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>