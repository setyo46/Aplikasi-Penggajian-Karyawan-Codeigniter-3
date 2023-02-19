<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="card shadow mb-4" style="width: 50%; margin-bottom: 100px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
            <div class="card-body">

                <?php echo form_open('admin/karyawan/input_karyawan_aksi')?> <!-- post-->
                
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control">
                        <?php echo form_error('nik','<div class="text-small text-danger"></div>') ?>         
                    </div>

                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control">
                        <?php echo form_error('nama_karyawan','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                        <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jabatan" class="form-control">
                            <option value="">--Pilih Jabatan--</option>
                            <?php foreach ($jabatan as $key => $value) { ?>
                            <option value="<?= $value->id_jabatan ?>"><?= $value->nama_jabatan?></option>
                            <?php } ?>
                        </select>
                            <?php echo form_error('id_jabatan','<div class="text-small text-danger"></div>') ?>    
                    </div>

                    <div class="form-group">
                        <label>Masa Kerja</label>
                        <input type="text" name="masa_kerja" class="form-control">
                        <?php echo form_error('masa_kerja','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Hak Akses</label>
                        <select name="id_hak_akses" class="form-control">
                            <option value="">--Pilih Hak Akses--</option>
                            <?php foreach ($hakakses as $key => $value) { ?>
                            <option value="<?= $value->id_hak_akses ?>"><?= $value->keterangan?></option>
                            <?php } ?>
                        </select>
                            <?php echo form_error('id_hak_akses','<div class="text-small text-danger"></div>') ?>    
                    </div>

                    <div class="form-group">
                        <label>NPP BPJS</label>
                        <select name="npp" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach ($bpjs as $key => $value) { ?>
                            <option value="<?= $value->npp ?>"><?= $value->npp?></option>
                            <?php } ?>
                        </select>
                            <?php echo form_error('npp','<div class="text-small text-danger"></div>') ?>    
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
                        <?php echo form_error('photo','<div class="text-small text-danger"></div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                        <?php echo form_error('photo','<div class="text-small text-danger"></div>') ?>
                    </div>
                    
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="<?= base_url('admin/karyawan/index') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                    
                <?php echo form_close() ?>
            </div>
    </div>
</div>
<!-- /.container-fluid -->