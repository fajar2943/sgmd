@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-spinner"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Processing Order</span>
                            <span class="info-box-number">
                                {{$processing}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Success Order</span>
                            <span class="info-box-number">
                                {{$success}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Expired Order</span>
                            <span class="info-box-number">
                                {{$expired}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-undo"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Cancel Order</span>
                            <span class="info-box-number">
                                {{$cancel}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <h3 style="display: inline-block">Laporan Tahun</h3> 
                    <form action="" method="get" id="formYear" style="display: inline-block">
                        <select name="year" id="year">
                        @for ($i = $minYear; $i <= date('Y'); $i++)
                            <option value="{{$i}}" @if($year == $i) selected @endif>{{$i}}</option>
                        @endfor
                        </select>
                    </form>
                </div>
                <div class="card-body">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- solid sales graph -->
                            <div class="card bg-gradient-info">
                              <div class="card-header border-0">
                                <h3 class="card-title">
                                  <i class="fas fa-th mr-1"></i>
                                  Penjualan
                                </h3>
                              </div>
                              <div class="card-body">
                                <canvas class="chart" id="penjualan-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- solid sales graph -->
                            <div class="card bg-gradient-info">
                              <div class="card-header border-0">
                                <h3 class="card-title">
                                  <i class="fas fa-th mr-1"></i>
                                  Keuangan
                                </h3>
                              </div>
                              <div class="card-body">
                                <canvas class="chart" id="finance-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script> --}}
<script>
    // Sales graph chart
  var salesGraphChartCanvas = $('#penjualan-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
    datasets: [
      {
        label: 'Terjual',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: {!! json_encode($orders) !!}
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 10,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })
</script>
<script>
    // Finance graph chart
  var financeGraphChartCanvas = $('#finance-chart').get(0).getContext('2d')

  var financeGraphChartData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
    datasets: [
      {
        label: 'Total',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: {!! json_encode($finance) !!}
      }
    ]
  }

  var financeGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 500000,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var financeGraphChart = new Chart(financeGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: financeGraphChartData,
    options: financeGraphChartOptions
  })
</script>

<script>
    $(document).ready(function () {
        $('#year').on('change', function(){
            $('#formYear').submit();
        })
    });
</script>
    
@endsection
