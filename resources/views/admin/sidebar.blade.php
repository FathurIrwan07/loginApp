<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="" alt="Logo" style="height: 40px; width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">Warga Bicara</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajement Pengguna
    </div>


    <!-- nav item kelola admin -->
    <li class="nav-item">
        <a class="nav-link" href="/admin">
            <i class="fas fa-user-cog"></i>
            <span>Kelola Admin</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajement Pengaduan
    </div>


    <!-- Layanan pengaduan -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pengaduans.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengaduan Masuk</span>
        </a>
    </li>



    <!-- <li class="nav-item">
        <a class="nav-link" href="/berkasproses">
            <i class="fas fa-fw fa-folder"></i>
            <span>Berkas di Proses</span>
        </a>
    </li> -->

    <!-- <li class="nav-item">
        <a class="nav-link" href="/berkasselesai">
            <i class="fas fa-fw fa-folder"></i>
            <span>Berkas Selesai</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/berkasditolak">
            <i class="fas fa-fw fa-folder"></i>
            <span>Berkas Ditolak</span>
        </a>
    </li> -->




    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>