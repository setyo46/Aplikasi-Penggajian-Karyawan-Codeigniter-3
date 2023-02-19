<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url ('karyawan/dashboard')?>">
                <!-- <div class="sidebar-brand-text mx-3">APP PENGGAJIAN</div> -->
                <img src="<?= base_url() ?>/assets/img/logo1.svg" style="width: 60%" >
            </a>

            <!-- Divider /Garis pembagi --> 
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url ('karyawan/dashboard')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url ('karyawan/gaji')?>">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Data Gaji</span>
                </a>
            </li>
            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('karyawan/ubah_password') ?>">
                <i class="fas fa-fw fa-unlock-alt"></i>
                    <span>Ubah Password</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h5 class="font-wight-bold">CV PERKASA TELKOMSELINDO</h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang <?= $this->session->userdata('nama_karyawan');?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/photo/').$this->session->userdata('photo');?>">
                            </a>
                        </li>

                    </ul>

                </nav>