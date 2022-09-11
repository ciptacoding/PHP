<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= url_root() ?>/admin">
    <div class="sidebar-brand-icon">
      <?= SITE_NAME ?>
    </div>
    <div class="sidebar-brand-text mx-2">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= ($sbActive == 'dashboard') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= url_root() ?>/admin">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dropdown Menu -->
  <li class="nav-item <?= ($sbActive == 'user') ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
      <i class="fas fa-fw fa-user"></i>
      <span>User</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= url_root() ?>/admin/user.php">Daftar User</a>
        <a class="collapse-item" href="<?= url_root() ?>/admin/user-add.php">Tambah User</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Dropdown Menu -->
  <li class="nav-item <?= ($sbActive == 'jurusan') ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJurusan" aria-expanded="true" aria-controls="collapseJurusan">
      <i class="fas fa-fw fa-book"></i>
      <span>Jurusan</span>
    </a>
    <div id="collapseJurusan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= url_root() ?>/admin/jurusan.php">Daftar Jurusan</a>
        <a class="collapse-item" href="<?= url_root() ?>/admin/jurusan-add.php">Tambah Jurusan</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Dropdown Menu -->
  <li class="nav-item <?= ($sbActive == 'mahasiswa') ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMahasiswa" aria-expanded="true" aria-controls="collapseMahasiswa">
      <i class="fas fa-fw fa-user-graduate"></i>
      <span>Mahasiswa</span>
    </a>
    <div id="collapseMahasiswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= url_root() ?>/admin/mahasiswa.php">Daftar Mahasiswa</a>
        <a class="collapse-item" href="<?= url_root() ?>/admin/mahasiswa-add.php">Tambah Mahasiswa</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>