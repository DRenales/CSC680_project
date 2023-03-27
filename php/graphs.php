<?php include 'connect.php'; ?>

<html>

	<head>
		<title>Covid Data Graphs</title>
		<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<link rel="stylesheet" href="../css/graphs.css">
		<script src="https://kit.fontawesome.com/6ddb656601.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	</head>

	<!-- <style> table, th, td{border: solid 3px black; } </style> -->

	<body class="graphs">
		<!-- TOP NAVIGATION BAR ELEMENTS -->
		<section class=topnav-bar>
			<a href="../html/index.html"><i class="fa fa-fw fa-home"></i> Main Page</a>
			<a class="active" href="graphs.php"><i class="fa-solid fa-square-poll-vertical"></i> Graphical Data</a>
			<a href="points.php"><i class="fa-sharp fa-solid fa-table"></i> Barred Data</a>
		</section>
	
		<!-- GRAPHICAL DATA ELEMENTS -->
		<section class="graph-data">
			<canvas id="myChart"></canvas>
		</section>
	
		
		<!-- TESTING MySQL CONNECTION WITH TABLE DATA -->
		
		<!-- <section class="test">
			<table>
				<tr>
					<th>Country Code</th>
					<th>Country</th>
					<th>WHO Region</th>
				</tr>
				<?php
					$conn = open_connection();
					$query = $conn->query("SELECT * FROM Countries");
					if ($query->num_rows > 0) 
					{
						while($row = $query->fetch_assoc()) 
						{
							//echo var_dump($row);
							
							echo "<tr>";
							echo "<td>".$row["Country_code"]."</td>";
							echo "<td>".$row["Country"]."</td>";
							echo "<td>".$row["WHO_region"]."</td>";
							echo "</tr>";
						}
					}
					close_connection($conn);
				?>
			</table> -->
		</section>
	</body>
	
	<script>
	  const ctx = document.getElementById('myChart');

	  new Chart(ctx, {
		type: 'line',
		data: {
		  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
		  datasets: [{
			label: '# of Votes',
			data: [12, 19, 3, 5, 2, 3],
			borderWidth: 1
		  }]
		},
		options: {
		  scales: {
			y: {
			  beginAtZero: true
			}
		  }
		}
	  });
	</script>

</html>