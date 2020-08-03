<!DOCTYPE html>
    <html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript">
    	$.fn.infiniteScrollUp=function(){
    		var self=this,kids=self.children()
    		kids.slice(20).hide()
    		setInterval(function(){
    			kids.filter(':hidden').eq(0).fadeIn()
    			kids.eq(0).fadeOut(function(){
    				$(this).appendTo(self)
    				kids=self.children()
    			})
    		},1000)
    		return this
    	}
    	$(function(){
    		$('tbody').infiniteScrollUp()
    	})
    	</script>
    	<title>infiniteScrollUp</title>
    </head>
    <body>
    <?Php 
	$f = fopen("copy.csv", "r");
	$fr = fread($f, filesize("copy.csv"));
	fclose($f);
	$lines = array();
	$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of...
	$cells = array(); 
	$cells = explode(",",$lines[1]);

	?>
<hr/>
<?php
if (strpos($cells[7], "Critical")!==false){ 
	
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
<div id="alarm">	
<?php
	for($i=count($lines)-2;$i>=count($lines)-8;$i--)
	{
		
		$cells = array(); 
		$cells = explode(",",$lines[$i]); 
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
		
		echo "</tr>";
		$mitigation=fopen($cells[3].".txt","r");
		$fr1 = fread($mitigation, filesize($cells[3].".txt"));
		fclose($mitigation);
		$lines1 = array();
		$lines1 = explode("\n",$fr1);	
	}
	?> 
	</div>
	</tbody> 
    
    </html>