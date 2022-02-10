<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/manajemen" class="nav-link {{ request()->is('/unit') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manajemen/laporan/masuk" class="nav-link {{ request()->is('manajemen/laporan/masuk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen/laporan/investigasi" class="nav-link {{ request()->is('manajemen/laporan/investigasi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Investigasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen/laporan/selesai" class="nav-link {{ request()->is('manajemen/laporan/selesai') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Selesai</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Tanggapan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manajemen/tanggapan/masuk" class="nav-link {{ request()->is('manajemen/tanggapan/masuk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tanggapan Masuk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Rekap
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manajemen/laporan-masuk" class="nav-link {{ request()->is('laporan/masuk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen/laporan-proses" class="nav-link {{ request()->is('laporan/proses') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Diteruskan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/manajemen/laporan-ditolak" class="nav-link {{ request()->is('laporan/ditolak') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Ditolak</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/manajemen/laporan-total" class="nav-link {{ request()->is('laporan/total') ? 'active' : '' }}">
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
                    <a href="/manajemen/laporan-selesai-puas" class="nav-link {{ request()->is('laporan/selesai-puas') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Puas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/manajemen/laporan/selesai-tidak-puas" class="nav-link {{ request()->is('laporan/selesai-tidak-puas') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Tidak Puas</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>