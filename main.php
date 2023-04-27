<!DOCTYPE html>
<html>
<head>
	<title>Emotion Detection Robot</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<style>
		.nav-link {
			color: #FFF;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <a class="navbar-brand" href="#">Emotion Detection Robot</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="#home">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#emotion">Emotion Detection</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#status">Robot Status</a>
	      </li>
	    </ul>
	  </div>
	</nav>

	<div id="home" class="container-fluid bg-light p-5">
		<h1>Welcome to the Emotion Detection Robot website</h1>
		<p class="lead">Our robot can detect emotions and display them in real-time. Explore the tabs to learn more about our robot.</p>
	</div>

	<div id="emotion" class="container-fluid bg-light p-5">
		<h2>Emotion Detection</h2>
		<div class="row">
			<div class="col-md-6">
				<p class="lead">Detected Emotions</p>
				<ul id="emotions-list" class="list-unstyled"></ul>
			</div>
			<div class="col-md-6">
				<div id="emotions-chart"></div>
			</div>
		</div>
	</div>

	<div id="status" class="container-fluid bg-light p-5">
		<h2>Robot Status</h2>
		<p class="lead">The robot is currently <span id="robot-status" class="text-success font-weight-bold">Online</span>.</p>
	</div>

	<script>
    $(document).ready(function(){
        // Emotion detection
        // Display the detected emotions dynamically
        var emotions = ["Happy", "Sad", "Angry", "Surprised"];
        var html = "";
        for(var i=0; i<emotions.length; i++){
            html += "<li>" + emotions[i] + "</li>";
        }
        $("#emotions-list").html(html);

        // Display the emotions chart dynamically
        Highcharts.chart('emotions-chart', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Detected Emotions'
            },
            series: [{
                name: 'Emotions',
                colorByPoint: true,
                data: [{
                    name: 'Happy',
                    y: 50,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Sad',
                    y: 20
                }, {
                    name: 'Angry',
                    y: 15
                }, {
                    name: 'Surprised',
                    y: 15
                }]
            }]
        });

        // Robot status
        // Display the robot status dynamically
        $("#robot-status").text("Offline").removeClass("text-success").addClass("text-danger");
    });
	</script>

