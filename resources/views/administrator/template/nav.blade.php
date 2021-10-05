<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/administrator" class="nav-link {{ request()->is('/administrator') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Petugas
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/administrator/data/admin" class="nav-link {{ request()->is('administrator/data/admin') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/data/unit" class="nav-link {{ request()->is('administrator/data/unit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/data/manajemen" class="nav-link {{ request()->is('administrator/data/manajemen') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Manajemen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/data/divisi" class="nav-link {{ request()->is('administrator/data/divisi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Divisi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Data Laporan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/administrator/laporan/masuk" class="nav-link {{ request()->is('administrator/laporan/masuk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/laporan/proses" class="nav-link {{ request()->is('administrator/laporan/proses') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/laporan/ditolak" class="nav-link {{ request()->is('administrator/laporan/ditolak') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Ditolak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/laporan-total" class="nav-link {{ request()->is('administrator/laporan-total') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Total</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Laporan Selesai
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/administrator/laporan/selesai" class="nav-link {{ request()->is('administrator/laporan/selesai') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Puas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/administrator/laporan/selesai-tidak-puas" class="nav-link {{ request()->is('administrator/laporan/selesai-tidak-puas') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Tidak Puas</p>
                    </a>
                  </li>
                </ul>
              </li>
             </ul>
            
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Cetak
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cetak/laporan/" class="nav-link {{ request()->is('/cetak/laporan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Total Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/cetak/laporan/selesai/" class="nav-link {{ request()->is('cetak/laporan/selesai') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Laporan Selesai</p>
                </a>
              </li>
               
          </li>
        </ul>
        <li class="nav-item">
          <a href="/laporan/hapus-laporan" class="nav-link">
            <i class="nav-icon fas fa-trash"></i>
            <p>Hapus Laporan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>