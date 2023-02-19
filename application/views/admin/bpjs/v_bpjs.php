<div class="container-fluid"> 

    <a class="btn btn-sm btn-success mb-3 shadow-sm" href="<?php echo base_url('admin/bpjs/input_bpjs') ?>">
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
                            <th>Id NPP</th>
                            <th>Kelas BPJS</th>
                            <th>Total Tagihan</th>
                            <th>Iuran Perusahaan</th>
                            <th>Iuran TK</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no= 1 ; foreach($bpjs as $b): ?>
                            <tr class="text-center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $b->npp?></td>
                                <td><?php echo $b->kelas?></td>
                                <td>Rp. <?php echo number_format($b->total_tagihan,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($b->iuran_perusahaan,0,',','.') ?></td>
                                <td>Rp. <?php echo number_format($b->total_tagihan - $b->iuran_perusahaan,0,',','.') ?>
                                </td>
                                <td>
                                    <center>
                                        <a href="<?= base_url('admin/bpjs/update_bpjs/' . $b->npp) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/bpjs/delete_bpjs/'. $b->npp) ?>"onclick="return confirm(Yakin Hapus)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
        