<div class="container-fluid"> 
   
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
                        <th>Bulan/Tahun</th>
                        <th>Gaji Dasar</th>
                        <th>Tj Dasar</th>
                        <th>Tj Jabatan</th>
                        <th>Tj Operasional</th>
                        <th>Tj Biaya Perumahan</th>
                        <th>Gross</th>
                        <th>Iuaran BPJS</th>
                        <th>Potongan</th>                            
                        <th>THP</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($potongan as $p)  {
						$pot_telat = $potongan[0]->jumlah_potongan;
                        $pot_alpha = $potongan[1]->jumlah_potongan;
					} ?>

                    <?php $no= 1; foreach($gaji as $g) : {?>
                        <?php $pot_gaji1 = $g->telat * $pot_telat ?>
                        <?php $pot_gaji2=  $g->alpha * $pot_alpha ?>
                        <?php $pot_gaji=   $pot_gaji1 + $pot_gaji2 ?>

                    <?php $iuran_bpjs = $g->total_tagihan - $g->iuran_perusahaan ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $g->bulan ?></td>
                            <td>Rp. <?php echo number_format($g->gaji_dasar,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($g->tj_dasar,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($g->tj_jabatan,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($g->tj_operasional,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($g->tj_biaya_perumahan,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan +  $g->tj_operasional + $g->tj_biaya_perumahan,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($iuran_bpjs,0,',','.') ?></td>
                            <td>Rp. <?php echo number_format($pot_gaji,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($g->gaji_dasar + $g->tj_dasar + $g->tj_jabatan +  $g->tj_operasional + $g->tj_biaya_perumahan - $pot_gaji - $iuran_bpjs,0,',','.') ?>
                            </td>
                            <td>
                                <center>
                                <a class="btn btn-primary" href="<?php echo base_url('karyawan/gaji/cetak_slip/'.$g->id_kehadiran) ?>">
                                <i class="fas fa-print"></i></a>
                                </center> 
                            </td>
                        </tr>
                    <?php } ?> 
                    <?php endforeach; ?>
                </tbody>        
            </table>        
        </div>            
    </div>
</div>

        