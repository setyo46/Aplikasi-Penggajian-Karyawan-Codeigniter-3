<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="card shadow mb-4" style="width: 60%; margin-bottom: 100px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
            <div class="card-body">

                <?php echo form_open('admin/bpjs/update_bpjs_aksi/'. $bpjs->npp)?> <!-- post-->
                
                    <div class="form-group">
                        <label>Kelas BPJS</label>
                        <input type="hidden" value="<?= $bpjs->npp ?>" name="npp" class="form-control">
                        <input type="text" value="<?= $bpjs->kelas ?>" name="kelas" class="form-control">
                        <?php echo form_error('kelas','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Total Tagihan</label>
                        <input type="text" value="<?= $bpjs->total_tagihan ?>" name="total_tagihan" class="form-control">
                        <?php echo form_error('total_tagihan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Iuran Perusahaan</label>
                        <input type="text" value="<?= $bpjs->iuran_perusahaan ?>" name="iuran_perusahaan" class="form-control">
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