<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Stock management</title>
	<style>
	
#box{

		 background: linear-gradient(to right, #003366 -60%, #cc99ff 65%);
		margin: auto;
		width: 1240px;
		height:2500px;
		box-shadow: 2px 2px 5px black;
	}

#box1{

		
		box-shadow: 2px 2px 5px black;
		text-shadow: 2px 2px 3px black;
	}

#mytable {
  border-collapse: collapse;
  
  border: 1px solid #ddd;
}


</style>
</head>

<body style= "background: 
           linear-gradient(to bottom left, #000066 0%, #ff99cc 100%);">


<nav class="navbar navbar-expand-lg navbar-light bg-info">
     
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="nav-link" href="profile-1.php">profile <span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="profile.php">Stock Status <span class="sr-only"></span></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="profile-1.php">Back <span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="daily.php">One Day Transaction Report</a>
                        <a class="dropdown-item" href="monthly.php">Monthly Transaction Report</a>
						<a class="dropdown-item" href="range.php">Between two dates</a>
						<a class="dropdown-item" href="pro_report.php">Product based report</a>
                        
                    </div>
                </li>
                
            </ul>
            
        </div> 
    </nav>
	

<br>

<form method="post">
<br><br><br>
 <div id= "box">
<table align="left" border="1"cellspacing="0" >
<tr>
<td>
<h1 id="box1">Purchase Entry</h1>

<table id ="mytable"  border="1" cellpadding="18" cellspacing="0"style= "box-shadow: 2px 2px 5px black">

<?php
session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	include("function.php");
	$admindata = verify($connection);





$sql = "SELECT * FROM purchase";
$result = mysqli_query($connection, $sql);


echo "<tr>";
echo "<th>purchase id</th><th>Product Name</th><th>Quantity</th><th>purchase date</th><th>Total Price</th>";
echo "</tr>";


if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
		
		$pro_id=$row['pro_id'] ;
		$sql5 = "SELECT * FROM product where pro_id='$pro_id' ";
		$result5 = mysqli_query($connection, $sql5);
		$row5 = mysqli_fetch_assoc($result5);
		// echo $row5['product_name'];
            echo "<tr>";
			echo "<td>" . $row['purchase_id'] . "</td>";
			
			echo "<td>" . $row5['product_name'] . "</td>";
			echo "<td>" . $row['quantity'] . "</td>";
			echo "<td>" . $row['date'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			echo "</tr>";

    }
} else {
    echo "0 results";
}

?>		
	</table>
</td>	
		</tr>	
		</table>
	
			
	
	<?php echo "\r\n";?>		
		
<table align="center" border="1"cellspacing="0" >
<tr>
<td>
<h1 id="box1">Sale Entry</h1>

<table id ="mytable" border="1" cellpadding="14.0" cellspacing="0"style= "box-shadow: 2px 2px 5px black">

<?php


$sql = "SELECT * FROM sale";
$result = mysqli_query($connection, $sql);


echo "<tr>";
echo "<th>Sale id</th><th>Product Name</th><th>Sale Quantity</th><th>Sale date</th><th>Total Sale Price</th>";
echo "</tr>";


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$pro_id=$row['pro_id'] ;
		$sql5 = "SELECT * FROM product where pro_id='$pro_id' ";
		$result5 = mysqli_query($connection, $sql5);
		$row5 = mysqli_fetch_assoc($result5);
		
		
            echo "<tr>";
			echo "<td>" . $row['sale_id'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td>" . $row5['product_name'] . "</td>";
			echo "<td>" . $row['sale_quantity'] . "</td>";
			echo "<td>" . $row['sale_date'] . "</td>";
			echo "<td>" . $row['sale_price'] . "</td>";
			echo "</tr>";

    }
} else {
    echo "0 results";
}
mysqli_close($connection);

?>		
			</table>
         </td>	
       </tr>
	
     </table>
</form>

</div>
	 <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>