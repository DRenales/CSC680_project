<?php
	include 'connect.php';
	//if($conn) echo "Success";
?>

<html>

	<head>
		<title>Covid Data Stats</title>
		<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<link rel="stylesheet" href="../css/points.css">
		<script src="https://kit.fontawesome.com/6ddb656601.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	</head>

	<body>
		<!-- TOP NAVIGATION BAR ELEMENTS -->
		<section class=topnav-bar>
			<a href="../html/index.html"><i class="fa fa-fw fa-home"></i> Main Page</a>
			<a href="graphs.php"><i class="fa-solid fa-square-poll-vertical"></i> Graphical Data</a>
			<a class="active" href="points.php"><i class="fa-sharp fa-solid fa-table"></i> Barred Data</a>
		</section>
		
		<section>
			<canvas id="myChart"></canvas>
		  
			<?php
		
			//Open the connection to begin pulling data
			$conn = open_connection();
			
			//Generate the X-Axis on the bar graph [To be edited later to provide a more dynamic means of selecting specific data]
			//Note to self, separate into php functions page later
			$query = $conn->query("SELECT country, cumulative_cases, cumulative_deaths 
								   FROM WHO_Sample
								   ORDER BY date_reported DESC
								   LIMIT 10;");
			if($query)
			{
				while($row= $query->fetch_assoc())
				{
					$xAxis[]  = $row["country"];
					$cases[]  = $row["cumulative_cases"];
					$deaths[] = $row["cumulative_deaths"];
				}
				$query->close();
			}
			?>
		
			
		</section>
		
	</body>

	<script>
	  var ctx = document.getElementById('myChart');

	  new Chart(ctx, {
		type: 'bar',
		data: {
		  labels: <?=json_encode(array_values($xAxis));?>, 
		  datasets: [
		  {
			label: 'Cases Count',
			data: <?=json_encode(array_values($cases));?>,
			borderWidth: 1
		  },
		  {
			label: 'Death Count',
			data: <?=json_encode(array_values($deaths));?>,
			borderWidth: 1
		  }
		  
		  ]
		},
		options: {
		  scales: {
			y: {
			  beginAtZero: true,
			  responsive: true
			}
		  }
		}
	  });
	</script>

</html>