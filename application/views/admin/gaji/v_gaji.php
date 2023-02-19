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

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <?php echo $this->session->flashdata('pesan')?>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Gaji Karyawan
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

                    <a class="btn btn-success mb-2 ml-3" href="<?php echo base_url('admin/gaji/input_gaji') ?>">
                    <i class="fas fa-plus"></i> Input Gaji</a>       
                
            </form>
        </div>
    </div>
        
    <div class="alert alert-info">
        Menampilkan Data Gaji Karyawan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> 
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

     <!-- alert data kosong -->
    <?php
	$jml_data = count($gaji);
	if($jml_data > 0 ) { ?>

    <div class="card shadow mb-">
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
                            <th>Gross</th>
                            <th>Iuaran BPJS</th>
                            <th>Potongan</th>                            
                            <th>THP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($potongan as $p)  {
                            $pot_telat = $potongan[0]->jumlah_potongan;
                            $pot_alpha = $potongan[1]->jumlah_potongan;
                           
                        } ?>
                        <?php $no= 1 ; foreach($gaji as $g) : {?>
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
                                <td>Rp. <?php echo number_format($g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan +                                
                                $g->tj_operasional + $g->tj_biaya_perumahan,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($iuran_bpjs,0,',','.') ?>
                                <td>Rp. <?php echo number_format($pot_gaji,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan + $g->tj_operasional + 
                                $g->tj_biaya_perumahan - $pot_gaji - $iuran_bpjs,0,',','.') ?></td> 
                                <td>
                                    <center>                                
                                        <a href="<?= base_url('admin/gaji/delete_gaji/' . $g->id_gaji)?>"onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>  
                            </tr>
                            

                            <?php } ?> 
                            <?php endforeach ;?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- alert data kosong-->
    <?php }else { ?>
		<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data gaji masih kosong, 
            silakan input data kehadiran pada bulan dan tahun yang anda pilih
        </span>
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
        Data gaji masih kosong, silahkan input absensi terlebih dahulu pada bulan dan tahun yang Anda pilih.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>