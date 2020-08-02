<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
</head>
<style>
.wrapper {
    text-align: center;
}

.button {
    margin:auto;
  display:block;
}
.panel{
    width:70%;
    padding-left:30%;
}
</style>
<body>

<div class="panel">
  <h2 style="text-align:center;">Enter the parameters</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" >Tank Level</label>
      <div class="col-sm-10">
        <input  class="form-control" id="tank" placeholder="Enter value" name="tank">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Input Pressure:</label>
      <div class="col-sm-10">          
        <input class="form-control" id="ipressure" placeholder="Enter value" name="ipressure">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Output Pressure:</label>
      <div class="col-sm-10">          
        <input class="form-control" id="opressure" placeholder="Enter value" name="opressure">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Flow:</label>
      <div class="col-sm-10">          
        <input class="form-control" id="flow" placeholder="Enter value" name="flow">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Temperature: </label>
      <div class="col-sm-10">          
        <input class="form-control" id="temp" placeholder="Enter value" name="temp">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="wrapper">
        <button  type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>

</body>
</html>
