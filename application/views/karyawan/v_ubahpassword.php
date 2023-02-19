<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="card shadow mb-4" style="width: 40%; margin-bottom: 100px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
            <div class="card-body">
            
            <form action="<?= base_url('karyawan/ubah_password/ubah_password_aksi')?>" method="POST"> 
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="passBaru" class="form-control">
                    <?php echo form_error('passBaru','<div class="text-small text-danger"></div>')?>
                </div>

                <div class="form-group">
                    <label>Ulangi Password</label>
                    <input type="password" name="ulangPass" class="form-control">
                    <?php echo form_error('ulangPass','<div class="text-small text-danger"></div>')?>
                </div>
                   
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            </div>
    </div>
</div>   
<!-- /.container-fluid -->