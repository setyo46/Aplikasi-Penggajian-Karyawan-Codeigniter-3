<div class="container-fluid"> 
    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/potongan/input_potongan') ?>">
    <i class="fas fa-plus"></i>Tambah Data</a>

    <?php echo $this->session->flashdata('pesan') ?>

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
                            <th>Jenis Potongan</th>
                            <th>Jumlah Potongan</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no= 1 ; 
                        foreach($potongan as $key => $value)  {?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $value->potongan ?></td>
                                <td>Rp. <?php echo number_format($value->jumlah_potongan,0,',','.') ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url('admin/potongan/update_potongan/' . $value->id_potongan) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/potongan/delete_potongan/' . $value->id_potongan) ?>"onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>

                            </tr>
                            <?php } ?>
                    </tbody>        
                </table>
        </div>        
    </div>            
</div>

        