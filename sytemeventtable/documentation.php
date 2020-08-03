<html><head>
	<!-- <script src="graph.js"></script> -->
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
  border-style: groove;
  padding: 1em;
}
#navbar {
  overflow: hidden;
  background-color: #333;
	z-index:1030;
}

#navbar a {
  float: left;
  display: block;
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
    </style><body><header>
		<div  id="navbar" >
        <a class=" waves-effect" href="https://gailonline.com/CR-JoinGail.html">
                    <img src="images/gail.jpeg" height="40" width="45"alt="">
                </a>
        <a  href="index.php">Dashboard</a>
      <a href="mitigation.php">Mitigation</a>
      <a href="report.php">Reports</a>
      <a href="logout.php">Logout</a>
      <p><?php session_start(); echo $_SESSION['name'].', '. $_SESSION['des'];?></p>
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
<body >
  <br>
  <br>
	<h4 style="text-align: center; font-size:50; font-family:Arial;">System design</h4>
	<h5 style="text-align: center; font-size:25;font-family:Arial;">Pipleline Design</h5>
<img src= "images/case.png" class="center">
<div>
	<h5 style="text-align: center; font-size:40; font-family:Arial;">Alarm categorization</h5>
	<ol >
		<li class="center" style="font-family:Arial;">Alarms are categorized as -> System Alarms, Event Alarms, Alert Alarms and  Critical Alarms</li>
		<li class="center" style="font-family:Arial;">System Alarms are generated for reminder and confirmation of component check</li>
		<li class="center" style="font-family:Arial;">Event Alarms are generated for confirmation of any action performed by component</li>
		<li class="center" style="font-family:Arial;">Alert and critical  alarms are generated when the sensor readings are in yellow and red range boxes, respectively as shown above </li>
		
	</ol>
	
</div>
<h5 style="text-align: center; font-size:40; font-family:Arial;">Patterns learnt by the system</h5>
<div id='myDiv'><!-- Plotly chart will be drawn inside this DIV -->
<script>
	Plotly.d3.csv('https://raw.githubusercontent.com/Stevert/bk226_Team-Rocket/master/alarmalarm.csv', function(err, rows){
function unpack(rows, key) {
	return rows.map(function(row)
	{ return row[key]; });}

var A = {
	x:unpack(rows, 'x1'), y: unpack(rows, 'y1'), z: unpack(rows, 'z1'),
	mode: 'markers',
  color: unpack(rows, 'Class'),
  hover_name: unpack(rows, 'Class'),
  symbol: 'circle',
	marker: {
		size: 10,
		line: {
		color: 'rgba(217, 217, 217, 0.14)',
		width: 0.5},
		opacity: 1},
	type: 'scatter3d'
};
  var C = {
	x:unpack(rows, 'x2'), y: unpack(rows, 'y2'), z: unpack(rows, 'z2'),
	mode: 'markers',
  color: unpack(rows, 'Class'),
  hover_name: unpack(rows, 'Class'),
  symbol: 'circle',
	marker: {
		size: 10,
		line: {
		color: 'rgba(217, 217, 217, 0.14)',
		width: 0.5},
		opacity: 1},
	type: 'scatter3d'
};
  var I = {
	x:unpack(rows, 'x3'), y: unpack(rows, 'y3'), z: unpack(rows, 'z3'),
	mode: 'markers',
  color: unpack(rows, 'Class'),
  hover_name: unpack(rows, 'Class'),
  symbol: 'circle',
	marker: {
		size: 10,
		line: {
		color: 'rgba(217, 217, 217, 0.14)',
		width: 0.5},
		opacity: 1},
	type: 'scatter3d'
};
  var Z = {
	x:unpack(rows, 'x4'), y: unpack(rows, 'y4'), z: unpack(rows, 'z4'),
	mode: 'markers',
  color: unpack(rows, 'Class'),
  hover_name: unpack(rows, 'Class'),
  symbol: 'circle',
	marker: {
		size: 10,
		line: {
		color: 'rgba(217, 217, 217, 0.14)',
		width: 0.5},
		opacity: 1},
	type: 'scatter3d'
};


var data = [A,C,I,Z];
var layout = {margin: {
	l: 0,
	r: 0,
	b: 0,
	t: 0
  }};
Plotly.newPlot('myDiv', data, layout);
});
</script>
</div>

</body></html>