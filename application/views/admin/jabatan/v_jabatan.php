<div class="container-fluid"> 

    <a class="btn btn-sm btn-success mb-3 shadow-sm" href="<?php echo base_url('admin/jabatan/input_jabatan') ?>">
    <i class="fas fa-plus"></i>Tambah Data</a>
    <?php echo $this->session->flashdata('pesan')?>
    
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
                            <th>Id Jabatan</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Dasar</th>
                            <th>Tj Dasar</th>
                            <th>Tj Jabatan</th>
                            <th>Tj Operasional</th>
                            <th>Tj Biaya Perumahan</th>
                            <th>Total</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no= 1 ; foreach($jabatan as $j): ?>
                            <tr class="text-center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $j->id_jabatan?></td>
                                <td><?php echo $j->nama_jabatan ?></td>
                                <td>Rp. <?php echo number_format($j->gaji_dasar,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($j->tj_dasar,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($j->tj_jabatan,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($j->tj_operasional,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($j->tj_biaya_perumahan,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($j->gaji_dasar + $j->tj_dasar + $j->tj_jabatan + $j->tj_operasional + $j->tj_biaya_perumahan,0,',','.') ?>
                                </td> 
                                <td>
                                    <center>
                                        <a href="<?= base_url('admin/jabatan/update_jabatan/' . $j->id_jabatan) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/jabatan/delete_jabatan/' . $j->id_jabatan) ?>"onclick="return confirm(Yakin Hapus)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                    </tbody>        
                </table>
            </div>
        </div> 
        
    </div>            

</div>
        