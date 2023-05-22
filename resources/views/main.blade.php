
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/PLN-mini.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="/home"><img src="../../assets/images/PLN.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="/home"><img src="../../assets/images/PLN-mini.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
       
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="../../assets/images/accountlogo.png" alt="profile"/>
              <span class="nav-profile-name">{{ auth() ->user()->username }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi-bi-box-arrow-right"></i> Logout</button>
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/home">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Data Diklat</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pdiklat">Perencanaan Diklat</a></li>
                <li class="nav-item"> <a class="nav-link" href="/rdiklat">Realisasi Diklat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/karyawan">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Data Karyawan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sertifikat">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Data Sertifikat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/vendor">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Vendors</span>
            </a>
          </li>
          
          @can('admin')
          <li class="nav-item">
            <a class="nav-link" href="/sasaran">
              <i class="mdi mdi-bullseye-arrow menu-icon"></i>
              <span class="menu-title">Sasaran</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/penetapan">
              <i class="mdi mdi-bullseye-arrow menu-icon"></i>
              <span class="menu-title">Pengaturan Penetapan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/downloadpdf">
              <i class="mdi mdi-file-pdf-box menu-icon"></i>
              <span class="menu-title">Cetak Laporan</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Pengaturan User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/user"> Data Akun </a></li>
              </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/activity/log">
              <i class="mdi mdi-notebook menu-icon"></i>
              <span class="menu-title">Log Aktivitas</span>
            </a>
          </li>

          

          @endcan

        </ul>
      </nav>

      <!-- partial -->
      @yield('container')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/template.js"></script>
  
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/dashboard.js"></script>
  <script src="../../assets/js/data-table.js"></script>
  <script src="../../assets/js/jquery.dataTables.js"></script>
  <script src="../../assets/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

