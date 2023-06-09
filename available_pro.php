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
<body style="background-color:black;">

	<style type="text/css">
	
	#button{

		padding: 15px;
		width: 200px;
		color: white;
		background-color: orange;
		border: none;
	}
	#button1{

		padding: 15px;
		width: 200px;
		color: black;
		background-color: white;
		border: none;
	}

	#square{

		background-color: #1E5A8730;
		margin: 420;
		width: 410px;
		padding:162px;
	}

	</style>

 <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <a class="navbar-brand" href="home.php">home</a>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="available_pro.php">See All Available Product</a>
                        
                    </div>
                </li>
                
            </ul>
            
        </div> 
    </nav>


<br><br>
<h2><div style="color: white;">Stock status</div></h2>


<table id ="mytable" border="3" cellpadding="20" cellspacing="0">

<?php


$sql = "SELECT * FROM total";
$result = mysqli_query($connection, $sql);




echo "<tr>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Product Name' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Total Quantity' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Total price' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Unit price' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Product description' . "</FONT></th>";

echo "</tr>";


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		$d=$row['product_name'];
		$sql1 = "SELECT * FROM product where product_name ='$d' " ;
		$result1 = mysqli_query($connection, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
	
		
            echo "<tr>";
			
			 echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['product_name'] . "</FONT></td>";
			 echo "<td><FONT COLOR='FFFFFF' style='font-size:20px' >" . $row['tot_quantity'] . "</FONT></td>";
			 echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['tot_price'] . "</FONT></td>";
			 echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row1['price'] . "</FONT></td>";
			  echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row1['product_description'] . "</FONT></td>";
			echo "</tr>";

    }
} else {
    echo "0 results";
}
mysqli_close($connection);

?>		
			</table>
			
         </td>	
       
  
		






</form>
<script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>