<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ASM</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        .panel{
    width:70%;
    padding-left:30%;
    margin-top:60px;
}
.card{
        width:20%;
        height:50%;
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        margin-top:250px;
        }
body{
  background-image: url('images/ffff.jpg');
  background-repeat: no-repeat;
  background-size: 100% 100%;
}
html {
    height: 100%
}
nav{
    background-color:#000000;
    height:50px;
}
</style>
</head>
<?php
	session_start();
	ob_start();
    ?>

<nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" style="color:white;" href="https://gailonline.com/CR-JoinGail.html" target="_blank">
				<img src="images/gail.png" class="img-fluid" alt="" height="40px;" width="50px;">Alarm management and Analytics System
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
       
        <body>
<div class="card">
<div class ="panel">
<form  action="login.php" method="post">

						<p class="h4 mb-4">Login</p>
						<!-- Email -->
						<input type="text" name="email" class="form-control mb-4" placeholder="E-mail">
						<!-- Password -->
						<input type="password" name="password" class="form-control mb-4" placeholder="Password">
						

						<input type="submit" class="btn btn-info btn-block my-4" value="Sign In"/>
                       </form>
</div>
</div>
                       <?php
					if (isset ($_POST['email'])&&isset ($_POST['password']))
					{
						//echo 'ok';
						$email=$_POST['email'];
						$password=$_POST['password'];
						
						if((($email=='chinukkinage@gmail.com')&&($password='pass'))||(($email=='1998.abhishek.kalgutkar@gmail.com')&&($password='pass'))||(($email=='2016.stevert.lobo@ves.ac.in')&&($password='pass'))){
									   
									$_SESSION['email']=$email;
									if($email=='chinukkinage@gmail.com'){
									$_SESSION['des']='Operator';
									$_SESSION['name']='Chinmayee';
								}
								if($email=='1998.abhishek.kalgutkar@gmail.com'){
									$_SESSION['des']='Administrator';
									$_SESSION['name']='Abhishek';
								}
								if($email=='2016.stevert.lobo@ves.ac.in'){
									$_SESSION['des']='Operator';
									$_SESSION['name']='Stevert';
								}
								
									
									
									
									
									
									/*echo 'session set';
									echo $user_id;*/
									//header('Location:loggedin_inc.php');
									if(isset ($_SESSION['name'])&& !empty($_SESSION['des'])&& isset ($_SESSION['email'])&& !empty($_SESSION['email']))
									{
										
										header('Location:documentation.php');	
										
									}
									else
									{
										echo 'Not logged in';
									}
								
								}}
                    ?>
                    </body>
						</html>