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
            th{
                text-align:left;
                background-color:rgb(0, 0, 0,0.5);
                color:white;
            }
			 thead tr th { 
				width: 700px; 
                font-size: 16px; 
				font-family: Arial;
                text-align:left;
			}           
			table.scrolldown tbody {                
				width:100%; 
			
				overflow-y: scroll;   
			}  
			td { 
			  width: 200px; 
              white-space:pre;
			  text-align:left; 
              font-size: 16px;
			  font-family: Arial;
			} 
    </style>
	<div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header text-center " >
                <h1 class="card-title" style="font-family:Arial; padding:0;">
                Mitigation Policies
                </h1>
            </div>
        </div>
   
<div class="card"style="margin-top:5px;">
	<div class="container">
	    <div class="card-header " >
		    <h3 class="card-title" style="font-family:Arial;">System response to alarms</h3>
            <br>
		    <div class="table-responsive-sm table table-hover">
			    <table class="scrolldown">
                    <tbody>
                    <?Php 
                    $filename="miti.csv";
                    $header=true;
                    $handle = fopen($filename, "r");
                    echo '<table>';
                    //display header row if true
                    if ($header) {
                        $csvcontents = fgetcsv($handle);
                        echo '<tr>';
                        foreach ($csvcontents as $headercolumn) {
                            echo "<th>$headercolumn</th>";
                        }
                        echo '</tr>';
                    }
                    // displaying contents
                    while ($csvcontents = fgetcsv($handle)) {
                        echo '<tr>';
                        foreach ($csvcontents as $column) {
                            echo "<td>$column</td>";
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                    fclose($handle);
                    // for i end
                    /* echo "</table></body></html>"; */
                    ?> 
                    </tbody> 
			  </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card"style="margin-top:5px;">
	<div class="container">
	    <div class="card-header " >
		    <h3 class="card-title" style="font-family:Arial;">General Mitigation Policies</h3></div>
            <br>
		    <div class="table-responsive-sm table table-hover">
			    <table class="scrolldown">
                    <tbody>
                    <?Php 
                    $filename="general.csv";
                    $header=true;
                    $handle = fopen($filename, "r");
                    echo '<table>';
                    //display header row if true
                    if ($header) {
                        $csvcontents = fgetcsv($handle);
                        echo '<tr>';
                        foreach ($csvcontents as $headercolumn) {
                            echo "<th>$headercolumn</th>";
                        }
                        echo '</tr>';
                    }
                    // displaying contents
                    while ($csvcontents = fgetcsv($handle)) {
                        echo '<tr>';
                        foreach ($csvcontents as $column) {
                            echo "<td>$column</td>";
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                    fclose($handle);
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
</html>
