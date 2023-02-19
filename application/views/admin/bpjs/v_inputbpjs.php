<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="card shadow mb-4" style="width: 60%; margin-bottom: 100px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
            <div class="card-body">

                <?php echo form_open('admin/bpjs/input_bpjs_aksi')?> <!-- post-->
                
                    <div class="form-group">
                        <label>NPP BPJS</label>
                        <input type="text" name="npp" class="form-control">
                        <?php echo form_error('npp','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Kelas BPJS</label>
                        <input type="text" name="kelas" class="form-control">
                        <?php echo form_error('kelas','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Total Tagihan</label>
                        <input type="text" name="total_tagihan" class="form-control">
                        <?php echo form_error('total_tagihan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Iuran Perusahaan</label>
                        <input type="text" name="iuran_perusahaan" class="form-control">
                        <?php echo form_error('iuran_perusahaan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="<?= base_url('admin/bpjs/index') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                    
                <?php echo form_close() ?>

            </div>

    </div>
</div>   
<!-- /.container-fluid -->