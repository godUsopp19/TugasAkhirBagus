
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sasaran</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/base/vendor.bundle.base.css">
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="shortcut icon" href="../../assets/images/PLN-mini.png" />
  <link rel="stylesheet" type="text/css" href="../../assets/vendors/DataTables/datatables.min.css"/>
 
  <script type="text/javascript" src="../../assets/vendors/DataTables/datatables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-custom">
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
          <li class="nav-item nav-profile">
            <a class="nav-link " href="/home"  id="profileDropdown">
              <img src="../../assets/images/accountlogo.png" alt="profile"/>
              <span class="nav-profile-name">{{ auth() ->user()->username }}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" id="profileDropdown">
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="mdi mdi-logout"></i> Logout</button>
                    </form>
                  
            </a>
           
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
            <a class="nav-link" href="/pdiklat">
              <i class="mdi mdi-file menu-icon"></i>
              <span class="menu-title">Perencanaan Diklat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/rdiklat">
              <i class="mdi mdi-briefcase-check menu-icon"></i>
              <span class="menu-title">Realisasi Diklat</span>
            </a>
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
            <a class="nav-link" href="/user">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Pengaturan User</span>
            </a>
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




    @can('admin')
    <div class="container-xxl p-0">
        <div class="row flex-row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    @if (session()-> has ('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-wrapper">
                          <a href="{{ route('sasaran.create') }}" class="btn btn-md btn-success mb-3">Add Sasaran</a>
                            <table id="table_id" class="table table-responsive display">
                                <thead>
                                    <tr>
                                      <th scope="col">Sasaran</th>
                                      <th scope="col">Action</th>
                                  
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse ($sasarans as $sasaran) 
                                      <tr>
                                          <td>
                                              {{$sasaran->Sasaran}}
                                          </td>
                                          
                                          <td class="text-center">
                                              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sasaran.destroy', $sasaran->id_sa) }}" method="POST">
                                                  <a href="{{ route('sasaran.edit', $sasaran->id_sa) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                              </form>
                                          </td>
                                      </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Sasaran belum Tersedia.
                                        </div>
                                    @endforelse
                                  </tbody>
                              </table>
                              
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    
    
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif

       $(document).ready(function() {
        $('#table_id').DataTable( {
        "scrollX": true,
        dom:'Blfrtip',
        columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        buttons: [
            {
                extend: 'colvis',
                columns: ':not(.noVis)',
                text: 'Filter'
            },
            {
            extend: 'excel',
            text: 'Export to Excel',
            title: 'Sasaran'
        }
                ]
        } );
        } );
  
        function addRowCount(tableAttr) {
        $(tableAttr).each(function(){
          $('th:first-child, thead td:first-child', this).each(function(){
            var tag = $(this).prop('tagName');
            $(this).before('<'+tag+'>No⠀⠀</'+tag+'>');
          });
          $('td:first-child', this).each(function(i){
            $(this).before('<td>'+(i+1)+'</td>');
          });
        });
      }

      // Call the function with table attr on which you want automatic serial number
      addRowCount('.display');
 
    </script>

</div>


  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/template.js"></script>
  
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/dashboard.js"></script>
  <script src="../../assets/js/data-table.js"></script>
  
  <!-- End custom js for this page-->

 


</body>

</html>






