<div class="container-fluid"> 

    <a class="btn btn-sm btn-success mb-3 shadow-sm" href="<?php echo base_url('admin/karyawan/input_karyawan') ?>">
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
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Masa Kerja</th>
                        <th>Hak Akses</th>
                        <th>NPP</th>
                        <th>Photo</th>  
                        <th>Email</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no= 1 ; foreach($karyawan as $k) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $k->nik ?></td>
                            <td><?= $k->nama_karyawan ?></td>
                            <td><?= $k->nama_jabatan  ?></td>               
                            <td><?= $k->masa_kerja ?></td>
                            <td><?= $k->keterangan?></td>
                            <td><?= $k->npp ?></td>
                            <td><img src="<?= base_url(). 'assets/photo/'. $k->photo ?>" width="75px"></td>
                            <td><?= $k->email ?></td>
                            
                            <td>
                                <center>
                                    <a href="<?= base_url('admin/karyawan/update_karyawan/' . $k->id_karyawan) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/karyawan/delete_karyawan/' . $k->id_karyawan)?>"onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </center>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>        
            </table>        
        </div>            
    </div>
</div>

        