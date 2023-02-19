<!-- Begin Page Content -->
<div class="container-fluid"> 
<div class="card shadow mb-4" style="width: 50%; margin-bottom: 100px">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
    </div>
        <div class="card-body">

            <form method="POST" action="<?php echo base_url('admin/karyawan/update_karyawan_aksi/'. $karyawan->id_karyawan )?>"><!-- post-->      
                
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" value="<?= $karyawan->nik ?>" name="nik" class="form-control">
                    <?php echo form_error('nik','<div class="text-small text-danger"></div>') ?>         
                </div>

                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" value="<?= $karyawan->nama_karyawan ?>" name="nama_karyawan" class="form-control">
                    <?php echo form_error('nama_karyawan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" value="<?= $karyawan->username ?>" name="username" class="form-control">
                    <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="id_jabatan" class="form-control">            
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $key => $value) { ?>
                        <option value="<?= $value->id_jabatan ?>" <?= $value->id_jabatan == $karyawan->id_jabatan ? 
                        'selected' : '' ?>> <?= $value->nama_jabatan ?></option>
                        <?php } ?>
                    </select>   
                    <?php echo form_error('id_jabatan','<div class="text-small text-danger"></div>') ?>
                                                  
                </div>

                <div class="form-group">
                    <label>Masa Kerja</label>
                    <input type="text" value="<?= $karyawan->masa_kerja ?>" name="masa_kerja" class="form-control">
                    <?php echo form_error('masa_kerja','<div class="text-small text-danger"></div>') ?>                 
                </div>

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="id_hak_akses" class="form-control">
                        <option value="">--Pilih Hak Akses--</option>
                        <?php foreach ($hakakses as $key => $value) { ?>
                        <option value="<?= $value->id_hak_akses ?>" <?= $value->id_hak_akses == $karyawan->id_hak_akses ? 
                        'selected' : '' ?>> <?= $value->keterangan ?></option>
                        <?php } ?>
                    </select>
                    <?php echo form_error('id_hak_akses','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>NPP BPJS</label>
                    <select name="npp" class="form-control">
                        <option value="">--Pilih NPP--</option>
                        <?php foreach ($bpjs as $key => $value) { ?>
                        <option value="<?= $value->npp ?>" <?= $value->npp == $karyawan->npp ? 
                        'selected' : '' ?>> <?= $value->npp ?></option>
                        <?php } ?>
                    </select>
                    <?php echo form_error('npp','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" value="<?= $karyawan->photo ?>" name="photo" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?= $karyawan->email ?>" name="email" class="form-control">
                    <?php echo form_error('email','<div class="text-small text-danger"></div>') ?>                 
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="<?= base_url('admin/karyawan/index') ?>" class="btn btn-primary">Kembali</a>
                </div>
                
            </form>


    </div>

</div>
</div>
<!-- /.container-fluid -->