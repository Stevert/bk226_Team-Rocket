 

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
 <!DOCTYPE HTML>
 <html>
 <head>
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
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
 </html>     