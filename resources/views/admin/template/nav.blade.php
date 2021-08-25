<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/laporan/masuk" class="nav-link {{ request()->is('laporan/masuk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/proses" class="nav-link {{ request()->is('laporan/proses') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Diteruskan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/selesai" class="nav-link {{ request()->is('laporan/selesai') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Selesai</p>
                </a>
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