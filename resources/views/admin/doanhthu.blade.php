@extends('admin.layout.masterpagead')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Thống kê doanh thu</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Doanh thu từng tháng
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="1000px"></canvas>
                            </div>
                        </div>
                    </div>
            </main>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
             integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ["Tháng 1","Tháng 2","Tháng 3","Tháng 4", "Tháng 5", "Tháng 6",
                       "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                  datasets: [{
                      label: 'Doanh thu',
                      data: <?php echo json_encode($dulieu);  ?> ,
                      backgroundColor: "rgba(2,117,216,1)",
                      borderColor: "rgba(2,117,216,1)",
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>
@endsection
