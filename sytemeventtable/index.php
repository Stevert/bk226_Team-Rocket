<!DOCTYPE html>
<title>Dashboard</title>
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
				
			}
			table.scrolldown tbody, table.scrolldown thead { 
				
				display: block; 
			}  
			 thead tr th { 
				width: 200px; 
                font-size: 16px; 
				font-family: Arial;
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
			  font-family: Arial;
			} 
    </style>
	<div class="container-fluid mt-5">
	<div class="card">
 <div class="card-header text-center " height="400" >
                        

          <h1 class="card-title" style="font-family:Arial; padding:0;">
            
            
            Alarm management and Analytics dashboard
          </h1>

        
</div></div>

<?Php 
	$f = fopen("copy.csv", "r");
	$fr = fread($f, filesize("copy.csv"));
	fclose($f);
	$lines = array();
	$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of...
	$cells = array();
	$len= count($lines);
	$cells = explode(",",$lines[$len-1]);
	
	?>
<hr/>
<?php
if (strpos($cells[8], "Critical")!==false){ 
	#print_r($cells[8]);
	
	?>
<div class="card"style="margin-top:5px;">
<div class="container-fluid fixed-top ">
    <div class=row>
    <div class=" ml-auto col-auto alert alert-warning alert-dismissible fade show" role="alert">
   <strong><b>Critical alarm occured!</b></strong> <br> Mail sent to Administrator.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
   </div>
    </div>
  </div>
  <?php
}
  ?>
	<div class="container">
	<div class="card-header " >
		<h3 class="card-title" style="font-family:Arial;">Real Time Alarms</h3></div>
		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead style="border-color :#5aa7a7;">
				  <tr>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;" >Timestamp</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Component</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Reason for alarm</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Nature</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Sensor type</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Value</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Alarm occurrence</th> 
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Alarm type</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;"> Action needed</th>           
				  </tr>
				</thead>
	<tbody>
	
<?php
	for($i=count($lines)-1;$i>=1;$i--)
	{
		
		$cells = array(); 
		$cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
		echo "<tr>";
		for($k=0;$k<count($cells)-1;$k++)
		{
		  if($k!=1 && $k!=8) 
		  echo "<td style='text-align:center';>".$cells[$k]."</td>";
		  if($k==8) {
		  echo "<td bgcolor='".$cells[1]."' style=color:white;>".$cells[$k]."</td>";
		 	if (strpos($cells[$k], "Critical")!==false) 
				  echo '<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal'.$i.'">View</button>
				  </td>';
			else

				  echo "<td></td>";
		  }
		}
		// for k end
		echo "</tr>";
		$mitigation=fopen($cells[3].".txt","r");
		$fr1 = fread($mitigation, filesize($cells[3].".txt"));
		fclose($mitigation);
		$lines1 = array();
		$lines1 = explode("\n",$fr1);
		echo'<!-- Modal -->
		<div class="modal fade" id="myModal'.$i.'" role="dialog">
		  <div class="modal-dialog">
		  
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				
				<h4 class="modal-title">Steps to follow:</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
				';
			foreach($lines1 as $line)
				echo $line."<br>";	
			  echo '</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
			
		  </div>
		</div>
	  ';
		
	}
	// for i end
	/* echo "</table></body></html>"; */
	?> 
	
	</tbody> 
			  </table>
		  </div>
		 </div>
		 </div>
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
$filename = 'freq2.csv';

// The nested array to hold all the arrays
$the_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_array[] = $data;		
  }

  // Close the file
  fclose($h);
}

// Display the code in a readable format
echo "<pre>";
$c=0;
$dataP=array();
foreach($the_array as $row) {
    $subarray = array(
        "label" => $row[0],
        "y" => floatval($row[1])
    );
array_push($dataP,$subarray);
}
array_shift($dataP);

$filename = 'sa.csv';

// The nested array to hold all the arrays
$array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $array[] = $data;		
  }

  // Close the file
  fclose($h);
}

// Display the code in a readable format
echo "<pre>";
$c=0;
$dP=array();
foreach($array as $row) {
    $subarray = array(
        "label" => $row[0],
        "y" => floatval($row[1])
    );
array_push($dP,$subarray);
}
array_shift($dP);

$filename = 'ea.csv';

// The nested array to hold all the arrays
$the = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the[] = $data;		
  }

  // Close the file
  fclose($h);
}

// Display the code in a readable format
echo "<pre>";
$c=0;
$d=array();
foreach($the as $row) {
    $subarray = array(
        "label" => $row[0],
        "y" => floatval($row[1])
    );
array_push($d,$subarray);
}
array_shift($d);
?>  
<script>
 window.onload = function() {
	
 
	CanvasJS.addColorSet("greenShades",
                [//colorSet Array

					"#5aa7a7" , "#96d7c6" , "#bac94a" , "#ffe251" , "#6c8cbf"               
                ]);
 var chart = new CanvasJS.Chart("chartContainer1", {
	colorSet: "greenShades",
	animationEnabled: true,
     
	 toolTip: {
			backgroundColor: "rgba(0,0,0,.8)",
			fontColor: "white"
		},
     subtitles: [{
         text: "Today",
		 fontFamily: "Arial"
     }],
     data: [{
         type: "column",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();

 var myPieChart = new CanvasJS.Chart("chartContainer2", {
	colorSet: "greenShades",
	animationEnabled: true,
   
	 toolTip: {
			backgroundColor: "rgba(0,0,0,.8)",
			fontColor: "white"
		},
     subtitles: [{
         text: "Today",
		 fontFamily: "Arial"
     }],
     data: [{
         type: "column",
         //yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($dataP, JSON_NUMERIC_CHECK); ?>
     }]
// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

      
    });
	myPieChart.render();

	var lineChart1 = new CanvasJS.Chart("lineChart1", {
	colorSet: "greenShades",
	animationEnabled: true,
   
	 toolTip: {
			backgroundColor: "rgba(0,0,0,.8)",
			fontColor: "white"
		},
     subtitles: [{
         text: "Today",
		 fontFamily: "Arial"
     }],
     data: [{
         type: "column",
         //yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($dP, JSON_NUMERIC_CHECK); ?>
     }]
// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

      
    });
	lineChart1.render();

	var lineChart2 = new CanvasJS.Chart("lineChart2", {
	colorSet: "greenShades",
	animationEnabled: true,
   
	 toolTip: {
			backgroundColor: "rgba(0,0,0,.8)",
			fontColor: "white"
		},
     subtitles: [{
         text: "Today",
		 fontFamily: "Arial"
     }],
     data: [{
         type: "column",
         //yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($d, JSON_NUMERIC_CHECK); ?>
     }]
// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

      
    });
	lineChart2.render();
}
 </script>
 
      
	  <div class="row wow fadeIn">

	  <div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
	
				<div class="card-header " >
		<h3 class="card-title" style="font-family:Arial;">Frequency of alarms</h3></div>
		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead style="border-color :#5aa7a7;">
				  <tr>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;" >Reason for alarm</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Frequency</th>
					        
				  </tr>
				</thead>
	<tbody>
	<?Php 
	$f = fopen("freq1.csv", "r");
	$fr = fread($f, filesize("freq1.csv"));
	fclose($f);
	$lines = array();
	$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 
	
	for($i=count($lines)-2;$i>0;$i--)
	{
		
		$cells = array(); 
		$cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
		echo "<tr>";
		for($k=0;$k<count($cells);$k++)
		{
		  
		  echo "<td>".$cells[$k]."</td>";
		  
		}
		// for k end
		echo "</tr>";
	}
	// for i end
	/* echo "</table></body></html>"; */
	?> 
	
	</tbody> 
			  </table>
		  </div></div></div>
                <div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" ><div class="card-header" >
                    <!--Card--><h3 class="card-title " style="font-family:Arial;">Frequency of alarms</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer1" style="height: 370px; width: 100%;"></div></div></div></div>
	
	<div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
	
				<div class="card-header " >
		<h3 class="card-title" style="font-family:Arial;">Classification of alarms</h3></div>
		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead style="border-color :#5aa7a7;">
				  <tr>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;" >Status</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Frequency</th>
					        
				  </tr>
				</thead>
	<tbody>
	<?Php 
	$f = fopen("freq2.csv", "r");
	$fr = fread($f, filesize("freq2.csv"));
	fclose($f);
	$lines = array();
	$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 
	
	for($i=count($lines)-2;$i>0;$i--)
	{
		
		$cells = array(); 
		$cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
		echo "<tr>";
		for($k=0;$k<count($cells);$k++)
		{
		  
		  echo "<td>".$cells[$k]."</td>";
		  
		}
		// for k end
		echo "</tr>";
	}
	// for i end
	/* echo "</table></body></html>"; */
	?> 
	
	</tbody> 
			  </table>
		  </div></div></div>
	
	<div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
                    <!--Card--><div class="card-header" >
                    <!--Card--><h3 class="card-title " style="font-family:Arial;">Classification of alarms</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div></div></div></div></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

 <div class="row wow fadeIn">
                <div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
	
				<div class="card-header " >
		<h3 class="card-title" style="font-family:Arial;">System alarm table</h3></div>
		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead style="border-color :#5aa7a7;">
				  <tr>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;" >Timestamp</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Alert</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Status</th>
					        
				  </tr>
				</thead>
	<tbody>
	<?Php 
	$f = fopen("sysalarm.csv", "r");
	$fr = fread($f, filesize("sysalarm.csv"));
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
		  
		  echo "<td>".$cells[$k]."</td>";
		  
		}
		// for k end
		echo "</tr>";
	}
	// for i end
	/* echo "</table></body></html>"; */
	?> 
	
	</tbody> 
			  </table>
		  </div></div></div><div class="col-lg-1 col-md-1 mb-1"></div><div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" ><div class="card-header " >
		<h3 class="card-title" style="font-family:Arial;">System alarm graph</h3></div><div id="lineChart1" style="height: 370px; width: 100%;"></div></div></div></div>
				<div class="row wow fadeIn">
                <div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
				<div class="card-header" >
		<h3 class="card-title" style="font-family:Arial;">Event alarm table</h3></div>
		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead style="border-color :#5aa7a7;">
				  <tr>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;" >Timestamp</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Alert</th>
					<th style="text-align:center;background-color:rgb(0, 0, 0,0.5);color:white;">Status</th>
					        
				  </tr>
				</thead>
	<tbody>
	<?Php 
	$f = fopen("eventalarm.csv", "r");
	$fr = fread($f, filesize("eventalarm.csv"));
	fclose($f);
	$lines = array();
	$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 
	
	for($i=count($lines)-2;$i>=count($lines)-6;$i--)
	{
		
		$cells = array(); 
		$cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
		echo "<tr>";
		for($k=0;$k<count($cells);$k++)
		{
		  
		  echo "<td>".$cells[$k]."</td>";
		  
		}
		// for k end
		echo "</tr>";
	}
	// for i end
	/* echo "</table></body></html>"; */
	?> 
	
	</tbody> 
			  </table>
		  </div></div></div><div class="col-lg-1 col-md-1 mb-1"></div>
                <div class="col-lg-5 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" ><div class="card-header " >
		<h3 class="card-title" style="font-family:Arial;">Event alarm graph</h3></div><div id="lineChart2" style="height: 370px; width: 100%;"></div></div></div></div>
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


</html>
