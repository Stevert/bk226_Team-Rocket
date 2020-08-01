<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<html lang="en">
	<style>

		::-webkit-scrollbar {
	  display: none;
	}
			  table.scrolldown { 
				width: 100%;
				border-spacing: 0; 
				border: 5px solid black; 
			}
			table.scrolldown tbody, table.scrolldown thead { 
				display: block; 
			}  
			 thead tr th { 
				width: 200px; 
                font-size: 16px; 
			}           
			table.scrolldown tbody {                
				width:100%; 
				height:240px;
				overflow-y: scroll;   
			}  
			td { 
			  width: 200px; 
			  text-align:center; 
              font-size: 16px;
			} 
    </style>

<?php

$filename = 'freq1.csv';

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }

  // Close the file
  fclose($h);
}

// Display the code in a readable format
echo "<pre>";
$c=0;
$dataPoints=array();
foreach($the_big_array as $row) {
    $subarray = array(
        "label" => $row[0],
        "y" => floatval($row[1])
    );
array_push($dataPoints,$subarray);
}
array_shift($dataPoints);
/*foreach($the_big_array as $row) {
    echo $row[0], '<br>';
    echo $row[1], '<br>';

echo "</pre>";
*/

?>  
<script>
 window.onload = function() {
  
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     title: {
         text: "Frequency of Alarms"
     },
     subtitles: [{
         text: "Today"
     }],
     data: [{
         type: "pie",
         //yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<div class="card">
	<div class="container">
		<h3 class="card-title" >Timestamp alarm list</h3>
		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead>
				  <tr>
					<th style="text-align:center" class="table-dark">Timestamp</th>
					<th style="text-align:center" class="table-dark">Component</th>
					<th style="text-align:center" class="table-dark">Reason for alarm</th>
					<th style="text-align:center" class="table-dark">Nature</th>
					<th style="text-align:center" class="table-dark">Sensor type</th>
					<th style="text-align:center" class="table-dark">range</th>
					<th style="text-align:center" class="table-dark">Alarm type</th>              
				  </tr>
				</thead>
	<tbody>
	<?Php 
	$f = fopen("copy.csv", "r");
	$fr = fread($f, filesize("copy.csv"));
	fclose($f);
	$lines = array();
	$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 
	
	for($i=count($lines)-2;$i>=count($lines)-7;$i--)
	{
		
		$cells = array(); 
		$cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
		echo "<tr>";
		for($k=0;$k<count($cells);$k++)
		{
		  if($k!=1 && $k!=7) 
		  echo "<td>".$cells[$k]."</td>";
		  if($k==7) 
		  echo "<td bgcolor='".$cells[1]."'>".$cells[$k]."</td>";
		}
		// for k end
		echo "</tr>";
	}
	// for i end
	/* echo "</table></body></html>"; */
	?> 
	
	</tbody> 
			  </table>
		  </div>
		 </div>
<head>
	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
								<tr class="row100 head">
										<th class="column100 column1" data-column="column1">System Alarm</th>
										<th class="column100 column2" data-column="column2"></th>
										<th class="column100 column3" data-column="column3"></th>
								
									</tr>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Timestamp</th>
								<th class="column100 column2" data-column="column2">Alert</th>
								<th class="column100 column3" data-column="column3">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row100">
								<td class="column100 column1" data-column="column1">8:00:00</td>
								<td class="column100 column2" data-column="column2">Acoustic</td>
								<td class="column100 column3" data-column="column3">Success</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">8:00:05</td>
								<td class="column100 column2" data-column="column2">Hydro Test</td>
								<td class="column100 column3" data-column="column3">Success</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">9:30:00</td>
								<td class="column100 column2" data-column="column2">Pump Status</td>
								<td class="column100 column3" data-column="column3">Malfunction</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">10:20:00</td>
								<td class="column100 column2" data-column="column2">Sensor Test</td>
								<td class="column100 column3" data-column="column3">Success</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">11:00:00</td>
								<td class="column100 column2" data-column="column2">Sprinkler Status</td>
								<td class="column100 column3" data-column="column3">Success</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">11:05:00</td>
								<td class="column100 column2" data-column="column2">Hydro Test</td>
								<td class="column100 column3" data-column="column3">Success</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table100 ver1 m-b-110">
						<table data-vertable="ver1">
							<thead>
									<tr class="row100 head">
											<th class="column100 column1" data-column="column1">Event Alarm</th>
											<th class="column100 column2" data-column="column2"></th>
											<th class="column100 column3" data-column="column3"></th>
									
										</tr>
								<tr class="row100 head">
									<th class="column100 column1" data-column="column1">Timestamp</th>
									<th class="column100 column2" data-column="column2">Log</th>
									<th class="column100 column3" data-column="column3">Status</th>
								</tr>
							</thead>
							<tbody>
								<tr class="row100">
									<td class="column100 column1" data-column="column1">8:10:00</td>
									<td class="column100 column2" data-column="column2">Pump</td>
									<td class="column100 column3" data-column="column3">Started</td>
								</tr>
	
								<tr class="row100">
									<td class="column100 column1" data-column="column1">12:00:05</td>
									<td class="column100 column2" data-column="column2">Pump</td>
									<td class="column100 column3" data-column="column3">Stopped</td>
								</tr>
	
								<tr class="row100">
									<td class="column100 column1" data-column="column1">14:30:00</td>
									<td class="column100 column2" data-column="column2">Pump</td>
									<td class="column100 column3" data-column="column3">Tripped</td>
								</tr>
	
								<tr class="row100">
									<td class="column100 column1" data-column="column1">21:20:00</td>
									<td class="column100 column2" data-column="column2">Tank level</td>
									<td class="column100 column3" data-column="column3">Low</td>
								</tr>
	
								<tr class="row100">
									<td class="column100 column1" data-column="column1">11:05:00</td>
									<td class="column100 column2" data-column="column2">Tank level</td>
									<td class="column100 column3" data-column="column3">High</td>
								</tr>
							</tbody>
						</table>
					</div>
				
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>