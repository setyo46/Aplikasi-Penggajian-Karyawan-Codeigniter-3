<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="card shadow mb-4" style="width: 60%; margin-bottom: 100px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
            <div class="card-body">
                <?php echo form_open('admin/potongan/update_potongan/' . $potongan->id_potongan) ?> <!-- post-->
                
                    <div class="form-group">
                        <label>Jenis Potongan</label>
                        <input type="text" value="<?= $potongan->potongan ?>" name="potongan" class="form-control">
                        <?php echo form_error('potongan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Potongan</label>
                        <input type="text" value="<?= $potongan->jumlah_potongan ?>" name="jumlah_potongan" class="form-control">
                        <?php echo form_error('jumlah_potongan','<div class="text-small text-danger"></div>')?>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="<?= base_url('admin/potongan/index') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                    
                <?php echo form_close() ?>
            
            </div>
    </div>
</div>
<!-- /.container-fluid -->