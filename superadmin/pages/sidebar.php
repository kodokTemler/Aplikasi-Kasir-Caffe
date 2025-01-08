<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="admin.php" class="active">
                        <i class="bi bi-circle"></i><span>Laporan Admin</span>
                    </a>
                </li>
                <li>
                    <a href="produk.php">
                        <i class="bi bi-circle"></i><span>Laporan Produk</span>
                    </a>
                </li>
                <li>
                    <a href="transaksi.php">
                        <i class="bi bi-circle"></i><span>Laporan Transaksi</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>