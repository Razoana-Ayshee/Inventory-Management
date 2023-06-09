<?php 
session_start();

	include("connection.php");
	include("function.php");
$admin_data = verify($connection);
	
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Admin profile</title>
	<style>
			body {
				background-color: grey;
				background-image: url('2.jpg');
				background-repeat: no-repeat;
				background-size: 100% 100%;
				background-position: center top;
			
			}
		</style>
		

</head>
<body style="background-color:grey;">

	<style type="text/css">
	
	#button{
height:40px;
		
		width: 220px;
		color: black;
		background-color: #ccccff;
		border: none;
		border-radius: 12px;
		box-shadow: 5px 5px 7px #000066;

	}
	#button1{

		height:41px;
		width: 220px;
		color: black;
		background-color: #9999ff;
		border: none;
		border-radius: 12px;
		box-shadow: 5px 5px 7px #000066;
	}

	#square{

		background-color: #1E5A8730;
		margin: 420;
		width: 740px;
		padding:161px;
	}

	</style>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
      <a class="navbar-brand" href="home.php">home</a>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="nav-link" href="profile-1.php">profile <span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="profile.php">Stock Status <span class="sr-only"></span></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="purchase_sale_entry.php">Transaction Report <span class="sr-only"></span></a>
                </li>
				
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="purchase.php">purchase</a>
                        <a class="dropdown-item" href="sale.php">Sale</a>
                        
                    </div>
                </li>
                
            </ul>
            
        </div> 
    </nav>
	
	
	
<table  align=" left " border="0"cellspacing="0">
<tr>
<td>
	<div id="square">
		
	
		
		<form method="post">
			<div style="font-size: 50px;margin: 20px;color: white;">Admin Panel</div>

		

	<a href="change_pass.php"><input id="button" value="change password"></a><br><br>
	<a href="add_product.php"><input id="button1" value="ADD product Information "></a><br><br>
	<a href="delete_product.php"><input id="button" value="Delete product Information"></a><br><br>
	<a href="update_product.php"><input id="button1" value="Update product Information"></a><br><br>
	<a href="logout.php"><input id="button" value=" Logout"></a><br><br>  
		

</div>             

 </td>	
       </tr>
	
     </table>





</form>

 <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>