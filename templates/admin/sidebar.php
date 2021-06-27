<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('assets/img/logo-puskes.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PUSKESMAS GAMBAH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/img/admin-icon.png') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link <?= page_active('admin') ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <?php
                $pagesekarang = $_SERVER['PHP_SELF'];
                $namaArray    = explode('/', $pagesekarang);
                $jumlah       = count($namaArray);
                $pagesekarang = $namaArray[$jumlah - 2];
                $link = [
                    'user',
                    'pegawai',
                    'jenis-imunisasi',
                    'jenis-vitamin',
                    'anak',
                    'ibu-hamil'
                ];
                ?>

                <li class="nav-item has-treeview <?= in_array($pagesekarang, $link) === true ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= in_array($pagesekarang, $link) === true ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user') ?>" class="nav-link <?= page_active('user') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pegawai') ?>" class="nav-link <?= page_active('pegawai') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/jenis-imunisasi') ?>" class="nav-link <?= page_active('jenis-imunisasi') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Imunisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/jenis-vitamin') ?>" class="nav-link <?= page_active('jenis-vitamin') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Vitamin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/anak') ?>" class="nav-link <?= page_active('anak') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Anak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/ibu-hamil') ?>" class="nav-link <?= page_active('ibu-hamil') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ibu Hamil</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>