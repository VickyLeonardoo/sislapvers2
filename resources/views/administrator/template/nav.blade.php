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
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data
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