<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="card shadow mb-4" style="width: 60%; margin-bottom: 100px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
            <div class="card-body">

                <?php echo form_open('admin/jabatan/input_jabatan_aksi')?> <!-- post-->
                
                    <div class="form-group">
                        <label>Id Jabatan</label>
                        <input type="text" name="id_jabatan" class="form-control">
                        <?php echo form_error('id_jabatan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control">
                        <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Gaji Dasar</label>
                        <input type="text" name="gaji_dasar" class="form-control">
                        <?php echo form_error('gaji_dasar','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Tunjangan Dasar</label>
                        <input type="text" name="tj_dasar" class="form-control">
                        <?php echo form_error('tj_dasar','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Tunjangan Jabatan</label>
                        <input type="text" name="tj_jabatan" class="form-control">
                        <?php echo form_error('tj_jabatan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Tunjangan Operasional</label>
                        <input type="text" name="tj_operasional" class="form-control">
                        <?php echo form_error('tj_operasional','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Tunjangan Biaya Perumahan</label>
                        <input type="text" name="tj_biaya_perumahan" class="form-control">
                        <?php echo form_error('tj_biaya_perumahan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="<?= base_url('admin/jabatan/index') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                    
                <?php echo form_close() ?>

            </div>

    </div>
</div>   
<!-- /.container-fluid -->