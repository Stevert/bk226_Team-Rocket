<!DOCTYPE html>
<title>Report</title>
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
            
        Monthly Report (jan-aug 2020)
          </h1>

        
</div></div>
<hr/>
<div class="card"style="margin-top:5px;">
	<div class="container">  

<?php
 
 $Pressure = array(
   array("y" => 90.1, "label" => "Sunday"),
     array("y" => 51.08, "label" => "Monday"),
     array("y" => 65, "label" => "Tuesday"),
     array("y" => 85, "label" => "Wednesday"),
     array("y" => 51.05, "label" => "Thursday"),
     array("y" => 37.57, "label" => "Friday"),
     array("y" => 55.72, "label" => "Saturday")
 );
  
 ?>
<?php
 
 $Flow = array(
   array("y" => 131.39, "label" => "Sunday"),
     array("y" => 376, "label" => "Monday"),
     array("y" => 270.06, "label" => "Tuesday"),
     array("y" => 218.75, "label" => "Wednesday"),
     array("y" => 376, "label" => "Thursday"),
     array("y" => 270, "label" => "Friday"),
     array("y" => 218.75, "label" => "Saturday")
 );
  
 ?>
 <?php
 
 $Temp = array(
   array("y" => 55.54, "label" => "Sunday"),
     array("y" => 62.5, "label" => "Monday"),
     array("y" => 72.5, "label" => "Tuesday"),
     array("y" => 52.66, "label" => "Wednesday"),
     array("y" => 43.5, "label" => "Thursday"),
     array("y" => 80.61, "label" => "Friday"),
     array("y" => 32.92, "label" => "Saturday")
 );
  
 ?>

<?php 
$St1 = array( 
	array("y" => 3373, "label" => "Critical" ),
	array("y" => 2435, "label" => "Alert" ),
	array("y" => 1842, "label" => "Critical (Corelated)" )
); 
?>


<?php 
$V = array( 
	array("y" => 4789, "label" => "Critical" ),
	array("y" => 2325, "label" => "Alert" ),
	array("y" => 1000, "label" => "Critical (Corelated)" )
); 
?>

<?php 
$T = array( 
	array("y" => 5454, "label" => "Critical" ),
	array("y" => 2394, "label" => "Alert" ),
	array("y" => 1999, "label" => "Critical (Corelated)" )
); 
?>

<?php 
$P = array( 
	array("y" => 2154, "label" => "Critical" ),
	array("y" => 6794, "label" => "Alert" ),
	array("y" => 4499, "label" => "Critical (Corelated)" )
); 
?>

<?php
/*
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
array_shift($d);*/
?> 
<script>
window.onload = function () { 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	/* title: {
		text: "Avg flow "
	}, */
	axisY: {
		title: "Flow"
	},
	data: [{
		type: "spline",
		dataPoints: <?php echo json_encode($Flow, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	/* title: {
		text: "Avg flow "
	}, */
	axisY: {
		title: "Temperature"
	},
	data: [{
		type: "spline",
		dataPoints: <?php echo json_encode($Temp, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	/* title: {
		text: "Avg flow "
	}, */
	axisY: {
		title: "Pressure"
	},
	data: [{
		type: "spline",
		dataPoints: <?php echo json_encode($Pressure, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();


var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: false,
	theme: "light2",
		axisY: {
		title: "Occurrence"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($St1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();



var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: false,
	theme: "light2",
		axisY: {
		title: "Occurrence"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($T, JSON_NUMERIC_CHECK); ?>
	}]
});
chart5.render();

var chart6 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: false,
	theme: "light2",
		axisY: {
		title: "Occurrence"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($V, JSON_NUMERIC_CHECK); ?>
	}]
});
chart6.render();


var chart7 = new CanvasJS.Chart("chartContainer7", {
	animationEnabled: false,
	theme: "light2",
		axisY: {
		title: "Occurrence"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($P, JSON_NUMERIC_CHECK); ?>
	}]
});
chart7.render(); 
}
</script>
<!-- 
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
         type: "pie",
         indexLabel: "{label} ({y})",
         dataPoints: <?php /* echo json_encode($dataPoints, JSON_NUMERIC_CHECK); */ ?>
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
         type: "pie",
         //yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php/*  echo json_encode($dataP, JSON_NUMERIC_CHECK);  */?>
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
         dataPoints: <?php /* echo json_encode($dP, JSON_NUMERIC_CHECK);  */?>
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
         dataPoints: <?php /* echo json_encode($d, JSON_NUMERIC_CHECK); */ ?>
     }]
// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

      
    });
	lineChart2.render();
}
 </script> -->
 
      
	  <div class="row wow fadeIn">
                <div class="col-lg-4 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" ><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Avg flow </h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
</div></div></div>
		<div class="col-lg-4 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
                    <!--Card--><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Avg Temp</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div></div></div></div>

	<div class="col-lg-4 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
                    <!--Card--><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Avg Pressure</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer3" style="height: 370px; width: 100%;"></div></div></div></div></div>

 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

 <div class="row wow fadeIn">
 <div class="col-lg-3 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" ><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Station 1 </h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
</div></div>

<button type="button" onclick="window.open('Sheet1.csv')">Download</button> 


</div>
		<div class="col-lg-3 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
                    <!--Card--><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Tank</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer5" style="height: 370px; width: 100%;"></div></div></div></div>

	<div class="col-lg-3 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
                    <!--Card--><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Valve</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer6" style="height: 370px; width: 100%;"></div></div></div></div>
    <div class="col-lg-3 col-md-5 mb-4"><div class="card  mb-4" width="400" height="400" >
                    <!--Card--><div class="card-header text-center" >
                    <!--Card--><h3 class="card-title text-center" style="font-family:Arial;">Pump</h3>
					</div>
                    <div class="card-body" >
    <div id="chartContainer7" style="height: 370px; width: 100%;"></div></div></div>
</div>

</div>

 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



		<div class="table-responsive-sm table table-hover">
			<table class="scrolldown">
				<thead style="border-color :#5aa7a7;">
				  <tr>
					<th style="text-align:center;background-color:rgb(90, 167, 167,0.7);color:white;" >TIME</th>
					<th style="text-align:center;background-color:rgb(90, 167, 167,0.7);color:white;">Tank Level</th>
					<th style="text-align:center;background-color:rgb(90, 167, 167,0.7);color:white;">S1 Input PT</th>
					<th style="text-align:center;background-color:rgb(90, 167, 167,0.7);color:white;">S1 Output PT</th>
					<th style="text-align:center;background-color:rgb(90, 167, 167,0.7);color:white;">S1 Output Flow</th>
					<th style="text-align:center;background-color:rgb(90, 167, 167,0.7);color:white;">Temperature</th>              
				  </tr>
				</thead>
	<tbody>
	<?Php 
	 $f = fopen("Sheet1.csv", "r");
	$fr = fread($f, filesize("Sheet1.csv"));
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
		  </div>
         </div>
         
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


</html>