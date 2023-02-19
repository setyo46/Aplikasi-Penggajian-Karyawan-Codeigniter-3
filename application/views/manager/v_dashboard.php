<div class="container-fluid">
   
    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%;" >
        Selamat datang, Anda login sebagai Manager
    </div>
    <div class="card" style="margin-bottom: 120px; width: 65%;">
        <div class="card-header font-weight-bold bg-primary text-white">
            Data Manager
        </div>    
        <?php foreach($karyawan as $k): ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img style="width: 250px;" src="<?php echo base_url('assets/photo/'.$k->photo) ?>" alt="">
                </div>
                
                <div class="col-md-7">
                    <table class="table">
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo $k->nik ?></td>
                    </tr>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>:</td>
                        <td><?php echo $k->nama_karyawan ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php echo $k->nama_jabatan ?></td>
                    </tr>
                    <tr>
                        <td>Masa Kerja</td>
                        <td>:</td>
                        <td><?php echo $k->masa_kerja ?></td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
</div>
</div>