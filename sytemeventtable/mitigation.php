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
      #navbar {
  overflow: hidden;
  background-color: #333;
	z-index:1030;
}

#navbar a {
  float: left;
  display: inline;
  color: #f2f2f2;
  text-align: left;
	padding-top:14px;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
#navbar p {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 15px;
}
#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: red;
}
#navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
	
}
    </style><?php session_start(); ?>
    <body><header>
		<div  id="navbar" >
		<a class=" waves-effect" href="https://gailonline.com/CR-JoinGail.html">
                <img src="images/gail.jpeg" height="40" width="45"alt="">
            </a>
            <a href="index.php">Dashboard</a>
		<a  href="documentation.php">Documentation</a>
 
  <a href="report.php">Reports</a>
	<a href="logout.php">Logout</a>
	<p><?php  echo $_SESSION['name'].', '. $_SESSION['des'];?></p>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script></header>
 <main class="pt-5 mx-lg-5">


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
                    $i=0;
                    while ($csvcontents = fgetcsv($handle)) {
                        echo '<tr>';
                        foreach ($csvcontents as $column) {
                          if($i==0)
                           { echo "<td style='background-color:rgba(255,0,0,0.3)'>$column</td>";}
                            else if($i==1)
                            {echo "<td style='background-color:rgba(255,153,51,0.3)'>$column</td>";}
                            else if($i==2)
                           { echo "<td class='table-warning'>$column</td>";}
                            else if($i==3)
                            {echo "<td class='table-success'>$column</td>";}
                        }$i++;
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
                    $i=0;
                    // displaying contents
                    while ($csvcontents = fgetcsv($handle)) {
                        echo '<tr>';
                        foreach ($csvcontents as $column) {
                          if($i==0)
                           { echo "<td style='background-color:rgba(255,0,0,0.3)'>$column</td>";}
                           else if($i==4)
                           { echo "<td class='table-warning'>$column</td>";}
                           else 
                           echo "<td class='table-success'>$column</td>";
                           /*  echo "<td>$column</td>"; */
                        }$i++;
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
