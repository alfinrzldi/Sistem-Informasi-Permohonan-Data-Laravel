<!-- resources/views/template/sidebar.blade.php -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: rgb(106, 160, 240);" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/pupr.jpg') }}" alt="" style="width: 50px; height: 50px; border-radius: 12px;">
        </div>
        <div class="sidebar-brand-text mx-3" style="color: rgb(255, 255, 255); font-size: small; font-weight: 500;">
            BWS KALIMANTAN III
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt" style="color: white;"></i>
            <span style="color: white;">Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: white; font-weight: 500;">
        Pengelolaan User
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daftaruser') }}">
            <i class="fas fa-fw fa-users" style="color: white;"></i>
            <span style="color: white;">Daftar User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/inputuser') }}">
            <i class="fas fa-fw fa-user" style="color: white;"></i>
            <span style="color: white;">Input User</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading" style="font-weight: 500; color: white;">
        Permohonan Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/permohonanbaru') }}">
            <i class="fas fa-fw fa-chart-area" style="color: white;"></i>
            <span style="color: white;">Permohonan Baru</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/permohonanproses') }}">
            <i class="fas fa-fw fa-chart-area" style="color: white;"></i>
            <span style="color: white;">Permohonan Proses</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/permohonanselesai') }}">
            <i class="fas fa-fw fa-table" style="color: white;"></i>
            <span style="color: white;">Permohonan Selesai</span></a>
    </li>
</ul>
