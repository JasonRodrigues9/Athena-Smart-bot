<!DOCTYPE html>
<html>
<head>
	<title>Emotion Detection Robot</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- Highcharts JS -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<style>
		.nav-link {
			color: #FFF;
			font-weight: bold;
		}
		#emotion button {
			margin-top: 10px;
		}
		#emotions-list li {
			padding: 5px 0;
			border-bottom: 1px solid #ccc;
		}
		#emotions-chart {
			min-width: 310px;
			max-width: 800px;
			height: 400px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Emotion Detection Robot</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#home-section">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#emotion-section">Emotion Detection</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#status-section">Robot Status</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Home Section -->
  <section id="home-section" class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 mb-3">Welcome to the Emotion Detection Robot website</h1>
          <p class="lead">Our robot can detect emotions and display them in real-time. Explore the tabs to learn more about our robot.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Emotion Detection Section -->
  <section id="emotion-section" class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="mb-4">Detected Emotions</h2>
          <ul id="emotions-list" class="list-unstyled mb-4"></ul>
        </div>
        <div class="col-lg-6">
          <h2 class="mb-4">Emotions Chart</h2>
          <div id="emotions-chart"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Robot Status Section -->
  <section id="status-section" class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="mb-4">Robot Status</h2>
          <p class="lead">The robot is currently <span id="robot-status" class="text-success font-weight-bold">Online</span>.</p>
          <button id="status-button" class="btn btn-primary btn-lg mb-3">Toggle Status</button>
          <p id="status-message" class="lead"></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-3 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead mb-0">Emotion Detection Robot &copy; 2023</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com
  
  <!-- Optional JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Feather icons
    feather.replace();

    // Robot status chart
    var ctx = document.getElementById("robot-status-chart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
          {
            label: "Online",
            data: [80, 85, 90, 85, 80, 85, 90, 85, 80, 85, 90, 85],
            fill: false,
            borderColor: "rgba(0, 255, 0, 1)"
          },
          {
            label: "Offline",
            data: [20, 15, 10, 15, 20, 15, 10, 15, 20, 15, 10, 15],
            fill: false,
            borderColor: "rgba(255, 0, 0, 1)"
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
          display: true,
          text: "Robot Status"
        },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true
              }
            }
          ]
        }
      }
    });

    // Emotion chart
    var ctx2 = document.getElementById("emotion-chart").getContext("2d");
    var myChart2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: ["Happy", "Sad", "Angry", "Surprised"],
        datasets: [
          {
            label: "Number of times detected",
            data: [15, 8, 5, 7],
            backgroundColor: ["rgba(255, 206, 86, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(54, 162, 235, 0.2)"],
            borderColor: ["rgba(255, 206, 86, 1)", "rgba(255, 99, 132, 1)", "rgba(255, 159, 64, 1)", "rgba(54, 162, 235, 1)"],
            borderWidth: 1
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
          display: true,
          text: "Emotion Detection Results"
        },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true
              }
            }
          ]
        }
      }
    });
  </script>
</body>
</html>