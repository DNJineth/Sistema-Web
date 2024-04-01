@extends('dash.index')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Progreso de curso</h1>


<!-- Content Row -->
<div class="row">

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Colas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                Avance de Colas {{ $resultado["colas"] ?? 0 }}/5

               
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pilas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart1"></canvas>
                </div>
                <hr>
                Avance de Pilas {{ $resultado["pilas"] ?? 0 }}/5
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Arboles</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart2"></canvas>
                </div>
                <hr>
        
                Avance de Arboles {{ $resultado["arboles"] ?? 0 }}/5
            </div>
        </div>
    </div>
</div>

</div>
<script src="{!! asset('dash/vendor/chart.js/Chart.min.js') !!}"></script>
<script>


// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Progreso", "Pendiente"],
    datasets: [{
      data: [{{ $resultado["colas"] ?? 0 }}, 5],
      backgroundColor: ['#FF8041', '#B61435'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


var ctx = document.getElementById("myPieChart1");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Progreso", "Pendiente"],
    datasets: [{
      data: [{{ $resultado["pilas"] ?? 0 }}, 5],
      backgroundColor: ['#FF8041', '#B61435'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Progreso", "Pendiente"],
    datasets: [{
      data: [{{ $resultado["arboles"] ?? 0 }}, 5],
      backgroundColor: ['#FF8041', '#B61435'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
@endsection
