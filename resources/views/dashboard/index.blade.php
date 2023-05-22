
@extends('main')



@section('container')
<div class="main-panel">
    <div class="content-wrapper" id="reportPage">
      
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="me-md-1 me-xl-1">
                <h2>Welcome back, {{ auth()->user()->username }}</h2>
                <h2>⠀</h2>
                
              </div>
              
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body dashboard-tabs p-0">
              <ul class="nav nav-tabs px-4" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview Tahun Ini</a>
                </li>
                
              </ul>
              <div class="tab-content py-0 px-0">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <!--div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Start date</small>
                        <div class="dropdown">
                          <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                          </div>
                        </div>
                        
                      </div>
                    </div-->
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-calendar-heart icon-lg me-3 text-info "></i>
                      <form class="form-inline" method="GET">
                        <div class="form-group mb-2">
                          <label for="filter" class="col-sm-2 col-form-label">Filter Tahun Perencanaan</label>
                          <input type="text" class="form-control" id="filter" name="filter" placeholder="Tahun">
                        </div>
                        <button type="submit" class="btn btn-primary ml-4 mb-2">Filter</button>
                      </form>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-folder me-3 icon-lg text-danger"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Jumlah Rencana</small>
                        <h5 class="me-2 mb-0">{{ $data }}</h5>        
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-briefcase-check me-3 icon-lg text-success"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Jumlah Realisasi</small>
                        <h5 class="me-2 mb-0">{{ $data2 }}</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-percent me-3 icon-lg text-secondary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Persentase Jumlah Realisasi Terhadap Rencana</small>
                        <h5 class="me-2 mb-0">{{ $data5 }} %</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account me-3 icon-lg text-warning"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Rencana Jumlah Peserta</small>
                        <h5 class="me-2 mb-0">{{ $data3 }}</h5>        
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-certificate me-3 icon-lg text-info"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Jumlah Sertifikat</small>
                        <h5 class="me-2 mb-0">{{ count((is_countable($data4)?$data4:[])) }}</h5>        
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Besar Biaya Realisasi</h4>
              <script>
                var databar={ 
                  labels:[
              'SUDAH DIBAYARKAN','HTD SUDAH MELAKUKAN PENAGIHAN','PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)',
              'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)','VENDOR BELUM MENGIRIM TAGIHAN'
            ],
            datasets: [
              {
                label: 'Jumlah Biaya tiap Status',
                data: [
                '{{ $dons1 }}','{{ $dons2 }}','{{ $dons3 }}','{{ $dons4 }}','{{ $dons5 }}',
              ],backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'],
           borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ]
              }
            ]
          };
              </script>
              <canvas id="baraChart"></canvas>
            </div>
          </div>
        </div>   
        </div>
        <div class="col">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Realisasi</h4>
              <script>
                var datadonat1={ 
                  labels:[
              'SUDAH DIBAYARKAN','HTD SUDAH MELAKUKAN PENAGIHAN','PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)',
              'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)','VENDOR BELUM MENGIRIM TAGIHAN'
            ],
            datasets: [
              {
                label: 'Jumlah Biaya tiap Status',
                data: [
                '{{ $donc1 }}','{{ $donc2 }}','{{ $donc3 }}','{{ $donc4 }}','{{ $donc5 }}',
            ],backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
        ],
         borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
        ]
              }
            ]
          };
              </script>
              <canvas id="doughnutChart1"></canvas>
            </div>
          </div>
        </div>   
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Persentase Penyerapan</h4>
              <script>
                var datadonat2={ 
                  labels:[
              'Penyerapan'
            ],
            datasets: [
              {
                label: 'Penyerapan',
                data: [
                '{{ $donp }}','{{ $donpp }}',
            ],backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ]
              }
            ]
          };
              </script>
              <canvas id="doughnutChart2"></canvas>
            </div>
          </div>
        </div> 
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Persentase Outstanding</h4>
              <script>
                var datadonat3={ 
                  labels:[
              'Outstanding'
            ],
            datasets: [
              {
                label: 'Outstanding',
                data: [
                '{{ $donou }}','{{ $donout }}',
            ],backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ]
              }
            ]
          };
              </script>
              <canvas id="doughnutChart3"></canvas>
            </div>
          </div>
        </div> 
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Persentase Out Going</h4>
              <script>
                var datadonat4={ 
                  labels:[
              'Out Going'
                ],
            datasets: [
              {
                label: 'Out Going',
                data: [
                '{{ $dons5 }}','{{ $donog }}',
            ],backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ]
              }
            ]
          };
              </script>
              <canvas id="doughnutChart4"></canvas>
            </div>
          </div>
        </div>  
      </div>  


      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sertifikat Expired per Bulan di Tahun Ini</h4>
              <script>
                var databars={ 
                  labels:[
              'Januari',
              'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
            ],
            datasets: [
              {
                label: 'Jumlah Sertifikat yang Expired',
                data: [
                  '{{ $jan1 }}','{{ $feb1 }}','{{ $mar1 }}','{{ $apr1 }}','{{ $may1 }}','{{ $jun1 }}',
                  '{{ $jul1 }}','{{ $aug1 }}','{{ $sep1 }}','{{ $oct1 }}','{{ $nov1 }}','{{ $des1 }}'
            ],backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ]
              }
            ]
          };
              </script>
              <canvas id="barxChart"></canvas>
            </div>
          </div>
        </div>   
        </div>
      
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
  </div>
  <script src="chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>    

  

@endsection


