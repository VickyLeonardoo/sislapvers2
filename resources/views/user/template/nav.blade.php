<nav class="main-header navbar navbar-expand-md navbar-light navbar-info">
    <div class="container">
      <a href="/lapor" class="navbar-brand">
        <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>SILA-POLI</strong> </span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/lapor" class="nav-link {{ request()->is('lapor') ? 'active' : '' }}">Home</a>
          </li>
          <li class="nav-item">
            <a href="/daftar/laporan" class="nav-link {{ request()->is('daftar/laporan') ? 'active' : '' }}">Daftar Laporan</a>
          </li>
        </ul>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
      </ul>
    </div>
  </nav>