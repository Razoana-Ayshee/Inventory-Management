<?php
session_start();

	include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

		
		
		
		
	</head>
<body style="background: linear-gradient(to left, #000066 48%, #9999ff 48%);">

<style type="text/css">
	
	

	#box{

		background-color: #00FFFFFF4D;
		margin: auto;
		width:55px;
		padding: 150px;
	}
	
	#button{

		padding: 10px;
		width: 220px;
		color: white;
		background-color: blue;
		border: none;
	}
	</style>
	
	
	
	
	

    <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <a class="navbar-brand" href="home.php">Inventory Management System</a>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="login.php">Login</a>
                        
                        
                    </div>
                </li>
                
            </ul>
            
        </div> 
    </nav>

	
	
	
	 <div class="container">

        <div class="row">
            <div class="col-md-4">
               
            </div>
            <div class="col-md-4">
                    
            </div>
            <div class="col-md-4">
                    
            </div>
			
        </div>
<br><br>
        <!-- carousel -->

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
			
                <div class="carousel-item ">
                    <img src="s.jpg" class="d-block w-100" alt="..." style="height: 600px;">
                </div>
                <div class="carousel-item">
                    <img src="s-1.jpg" class="d-block w-100" alt="..." style="height: 600px;">
                </div>
                <div class="carousel-item">
                    <img src="c.jpg" class="d-block w-100" alt="..." style="height: 600px;">
                </div>
				<div class="carousel-item ">
                    <img src="t.jpg" class="d-block w-100" alt="..." style="height: 600px;">
            </div>
			<div class="carousel-item active">
                    <img src="banner.jpg" class="d-block w-100" alt="..." style="height: 600px;">
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
	
	
	
	
	
	

	<div id="box">
<!--  The HTML <div> tag is used for defining a section of your document. With the div tag,
 you can group large sections of HTML elements together and format them with CSS. -->
			
	
	</div>
	  <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>