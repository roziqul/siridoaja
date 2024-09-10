<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" >
                <img src="assets/img/logo.png" width="200" alt="Logo">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">
                <img src="assets/img/logo.png" width="200" alt="Logo">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li id="nav-1">
                <a href="#" class="nav-link" onclick="loadPage('dashboard.php', 1)"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li id="nav-2" class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-university"></i> <span>Pembayaran PBB-P2</span></a>
                <ul class="dropdown-menu">
                    <li id="nav-2-1"><a class="nav-link" href="#" onclick="loadPage('pembayaran-pbb-p2/kecamatan.php', 1, 2)">PBB-P2 Kecamatan</a></li>
                    <li id="nav-2-2"><a class="nav-link" href="#" onclick="loadPage('pembayaran-pbb-p2/kelurahan.php', 2, 2)">PBB-P2 Kelurahan/Desa</a></li>
                    <li id="nav-2-3"><a class="nav-link" href="#" onclick="loadPage('pembayaran-pbb-p2/harian.php', 3, 2)">Realisasi Harian</a></li>
                    <li id="nav-2-4"><a class="nav-link" href="#" onclick="loadPage('pembayaran-pbb-p2/status-nop.php', 4, 2)">Status NOP</a></li>
                </ul>
            </li>
            <li id="nav-3" class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-signal"></i> <span>Pelayanan PBB-P2</span></a>
                <ul class="dropdown-menu">
                    <li id="nav-3-1"><a class="nav-link" href="#" onclick="loadPage('pelayanan-pbb-p2/pelayanan.php', 1, 3)">Pelayanan PBB P2</a></li>
                    <li id="nav-3-2"><a class="nav-link" href="#" onclick="loadPage('pelayanan-pbb-p2/status.php', 2, 3)">Status Pelayanan</a></li>
                </ul>
            </li>
            <li id="nav-4" class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-chart-pie"></i> <span>Pajak Daerah Lain</span></a>
                <ul class="dropdown-menu">
                    <li id="nav-4-1"><a class="nav-link" href="#" onclick="loadPage('pd-lain/bphtb.php', 1, 4)">BPHTB</a></li>
                    <li id="nav-4-2"><a class="nav-link" href="#" onclick="loadPage('pd-lain/reklame.php', 2, 4)">Pajak Reklame</a></li>
                    <li id="nav-4-3"><a class="nav-link" href="#" onclick="loadPage('pd-lain/restoran.php', 3, 4)">Pajak Restoran</a></li>
                    <li id="nav-4-4"><a class="nav-link" href="#" onclick="loadPage('pd-lain/air-tanah.php', 4, 4)">Pajak Air Tanah</a></li>
                    <li id="nav-4-5"><a class="nav-link" href="#" onclick="loadPage('pd-lain/hotel.php', 5, 4)">Pajak Hotel</a></li>
                    <li id="nav-4-6"><a class="nav-link" href="#" onclick="loadPage('pd-lain/hiburan.php', 6, 4)">Pajak Hiburan</a></li>
                    <li id="nav-4-7"><a class="nav-link" href="#" onclick="loadPage('pd-lain/mineral.php', 7, 4)">Pajak Mineral</a></li>
                    <li id="nav-4-8"><a class="nav-link" href="#" onclick="loadPage('pd-lain/parkir.php', 8, 4)">Pajak Parkir</a></li>
                </ul>
            </li>
            <li id="nav-5">
                <a href="#" class="nav-link" onclick="loadPage('login.php', 5)"><i class="fas fa-user"></i><span>Administrator</span></a>
            </li>
        </ul>
    </aside>
</div>