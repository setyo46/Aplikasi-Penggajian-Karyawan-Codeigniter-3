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
    <div class="card mx-auto justify-content-between mb-3" style="width: 35%" >
        <div class="card-header bg-primary text-white text-center">
			FIlter Laporan Kehadiran Karyawan
		</div>
        
        <div class="card-body">
        <form>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    <select class="form-control" name="tahun">
                        <option value=""> Pilih Tahun </option>
                        <?php $tahun = date('Y');
                        for($i=2022;$i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>    
            </div>

            <center>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Pilih  </button>
                
                <?php if(count($kehadiran) > 0 ) { ?>

                <a href="<?= base_url('manager/laporankehadiran/cetak_laporan_kehadiran?bulan='.$bulan),'&tahun='.$tahun?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak </a>

                <?php } else { ?>
                    <button type="button"  data-toggle="modal" data-target="#exampleModal"class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak </button>
                <?php } ?>
            </center>
     
        </form>                           
        </div>     
    </div>
    <center><div class="text-center alert alert-info" style="width: 40%">
        Laporan Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> 
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div></center>

    
     <!-- alert data kosong -->
     <?php
	$jml_data = count($kehadiran);
	if($jml_data > 0 ) { ?>
    

    <!-- alert data kosong-->
    <?php }else { ?>
		<center><span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data kehadiran masih kosong, 
            silakan input data kehadiran pada bulan dan tahun yang anda pilih
        </span></center>
	<?php } ?>
</div>

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
        
   