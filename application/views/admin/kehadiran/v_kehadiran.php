<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <?php echo $this->session->flashdata('pesan')?>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Kehadiran Karyawan
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
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Tahun :</label>
                    <select class="form-control ml-3" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for($i=2022;$i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>              
                
                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                    <a class="btn btn-success mb-2 ml-3" href="<?php echo base_url('admin/kehadiran/input_kehadiran') ?>">
                    <i class="fas fa-plus"></i> Input Kehadiran</a>               
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
        Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> 
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <?php
	$jml_data = count($kehadiran);
	if($jml_data > 0 ) { ?>

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
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                            <th>Telat</th>
                            <th>Action</th>
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
                                <td class="text-center" ><?= $k->hadir?></td> 
                                <td  class="text-center"><?= $k->sakit?></td> 
                                <td  class="text-center"><?= $k->alpha?></td>
                                <td  class="text-center"><?= $k->telat?></td>
                                <td>
                                    <center>                                
                                        <a href="<?= base_url('admin/kehadiran/delete_kehadiran/' . $k->id_kehadiran)?>"onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>                             
                            </tr>
                            <?php } ?>                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- alert data kosong-->
    <?php }else { ?>
		<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silakan input data kehadiran pada bulan dan tahun yang anda pilih</span>
	<?php } ?>

</div>