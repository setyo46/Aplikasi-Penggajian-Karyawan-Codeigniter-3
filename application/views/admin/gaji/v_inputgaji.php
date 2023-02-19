<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>

    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            Input Gaji Karyawan
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2">Bulan :</label>
                    <select class="form-control ml-3" name="bulan">
                        <option value="">--Pilih Bulan--</option>
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
                <div class="form-group mb-2 ml-5 mr-5">
                    <label for="staticEmail2">Tahun :</label>
                    <select class="form-control ml-3" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for($i=2022;$i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2 ml-5">
                    <label class="text-danger"><b>Input Data Gaji Sesuai Bulan Kehadiran</b></label>
                </div>    

                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate</button> 
                    
            </form>
        </div>
    </div>
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
    <div class="alert alert-info">
        Menampilkan Data Gaji Karyawan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> 
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    
    
    <?php
	$jml_data = count($input_gaji);
	if($jml_data > 0 ) { ?>
        
    <form action="<?= base_url('admin/gaji/input_gaji_aksi'); ?>" method="post">
        <button class="btn btn-success mb-3" type="submit">Simpan</button>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">       
                        <thead class="thead-light">
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
                                <th>Bulan Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no= 1 ; 
                            foreach($input_gaji as $key => $value)  {?>
                                <tr class="text-center">

                                    <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun?>">
                                    <input type="hidden" name="id_karyawan[]" class="form-control" value="<?php echo $value['id_karyawan']?>">
                                    <input type="hidden" name="id_jabatan[]" class="form-control" value="<?php echo $value['id_jabatan']?>">
                                    <input type="hidden" name="id_kehadiran[]" class="form-control" value="<?php echo $value['id_kehadiran']?>">
                                
                   
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nik'] ?></td>
                                    <td><?= $value['nama_karyawan']?></td>
                                    <td><?= $value['nama_jabatan']?></td>
                                    <td><?= $value['gaji_dasar']?></td>
                                    <td><?= $value['tj_dasar']?></td>
                                    <td><?= $value['tj_jabatan']?></td>
                                    <td><?= $value['tj_operasional']?></td>
                                    <td><?= $value['tj_biaya_perumahan']?></td>
                                    <td><?= $value['bulan']?></td>
                                    
                                    
                                </tr>
                                <?php } ?>     

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>    

   <!-- alert data kosong-->
    <?php }else { ?>
		<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data sudah di isi, silakan input data gaji pada bulan dan tahun yang lain</span>
    <?php } ?>
    
    
</div>