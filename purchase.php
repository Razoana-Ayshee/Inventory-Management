<?php 

session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	include("function.php");
	$admindata = verify($connection);
	$h=0;
	$pro_id=0;
 




	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$product_name = $_POST['product_name'];
		$quantity = $_POST['quantity'];
		$price1 = $_POST['price'];
		date_default_timezone_set("Asia/Dhaka");
	    $date = date('Y-m-d'); 
		 
		 
		 $query = "select * from product where product_name= '$product_name' and price='$price1' ";
		

		$re = mysqli_query($connection,$query);
		if($re && mysqli_num_rows($re) > 0)
		{
			

			$pro_info = mysqli_fetch_assoc($re);
			$pro_id=$pro_info['pro_id'];
			
			
			
		}
		 else{
				echo "product or unit price doesnot exists. "; 
			}
		 
		 
     $month = date('F', strtotime($date));
		$price=$quantity*$price1;
		//$month = date("m",strtotime($date));
		$query2 = "insert into purchase (pro_id,quantity,date,month,price) values('$pro_id','$quantity','$date','$month' ,'$price')";
			$result2 = mysqli_query($connection, $query2);
			
		
		
		$query1 = "select * from total where pro_id='$pro_id' limit 1";
			$result1 = mysqli_query($connection, $query1);
							
				if($result1 && mysqli_num_rows($result1) > 0)
				{
					//echo "hoy";
					$pro_info1 = mysqli_fetch_assoc($result1);
					$qnty=$pro_info1['tot_quantity'];
					$tot_quantity=$quantity+$qnty;
					
					$prc=$pro_info1['tot_price'];
					$tot_price=$price+$prc;
					$query4 = "UPDATE total SET pro_id='$pro_id', tot_quantity='$tot_quantity',tot_price='$tot_price'WHERE pro_id='$pro_id'";
			
					if($result4 = mysqli_query($connection, $query4)>0){
		
						header("Location: purchase_sale_entry.php");
						echo "hoyna";
					die;}
							
					else
			{
				echo "purchase does not complete successfully(up)  ";
			}
					

				}	
			
					
				
			else{
			
			$query = "insert into total(pro_id,tot_quantity,tot_price) values('$pro_id','$quantity','$price')";
			if($result = mysqli_query($connection, $query)){
			header("Location: purchase_sale_entry.php");
			
			die;}
			
			else{
				echo " does not complete successfully in total"; 
			}
			
			}
			
			
			
			
			
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Purchase product</title>
	

	
</head>
<body style= "background: 
           linear-gradient(to left, #000066 -50%, #ff99cc 150%);">

	<style type="text/css">
	
	#box{

		 background: linear-gradient(to right, #003366 -60%, #cc99ff 65%);
		margin: auto;
		width: 500px;
		padding: 50px;
		box-shadow: 2px 2px 5px black;
	}

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
	
	#box1{

		background-color: white;
	

	</style>
	
	
	
<div id="box1">
	
<table align="left" border="0"cellspacing="0" >
<tr>
<td>
<h1>All Products Information</h1>

<table id ="mytable" border="1" cellpadding="13" cellspacing="0">

<?php


$sql1 = "SELECT * FROM product";
$result1 = mysqli_query($connection, $sql1);


echo "<tr>";


echo "<th><FONT COLOR='black' style='font-size:20px'>" . 'product id' . "</FONT></th>";
echo "<th><FONT COLOR='black' style='font-size:20px'>" . 'Product Name' . "</FONT></th>";
echo "<th><FONT COLOR='black' style='font-size:20px'>" . 'product description' . "</FONT></th>";
echo "<th><FONT COLOR='black' style='font-size:20px'>" . 'unit' . "</FONT></th>";
echo "<th><FONT COLOR='black' style='font-size:20px'>" . 'Price' . "</FONT></th>";

echo "</tr>";


if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
            echo "<tr>";
			echo "<td><FONT COLOR='black' style='font-size:20px'>" . $row['pro_id'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td><FONT COLOR='black' style='font-size:20px'>" . $row['product_name'] . "</td>";
			echo "<td><FONT COLOR='black' style='font-size:20px'>" . $row['product_description'] . "</td>";
			echo "<td><FONT COLOR='black' style='font-size:20px'>" . $row['unit'] . "</td>";
			echo "<td><FONT COLOR='black' style='font-size:20px'>" . $row['price'] . "</td>";
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
	
	
	
	
	
	
	
	
	
	<table align="right" border="0"cellspacing="0" >
	<tr>
<td>
	<div id="box">
	
	<form method="post">
				<div style="font-size: 30px;margin: 20px;color: white;">purchase Product </div>
				
	<table id ="mytable" border="0" cellpadding="13" cellspacing="0">

<tr>
				<td><?php //echo "<br><br>"; ?>
				<div style="font-size: 23px;margin: 20px;color: white;">Selecet product:</td>
				<td><input list="product" name="product_name"placeholder="enter product name" required></div></input></td>
				
			</tr>

<tr>
				<td>	<div style="font-size: 23px;margin: 20px;color: white;">Quantity:</td>
				<td><input type="number" name="quantity"placeholder="enter quantity " required><br><br></div></td>
				
</tr>


<tr>
				<td><div style="font-size: 23px;margin: 20px;color: white;">Unit Price:</td>
				<td><input type="number" name="price"placeholder="enter product price" required><br><br></div></td>
				
			</tr>


			</table>
	
	
	
		
			<input  id="button" type="submit" value="purchase">
				<a href="profile-1.php"><input id="button" value="                   Back"></a><br><br>
			

	
		</form>
		</td>
		</tr>
		</table>
	</div>
	
</body>
</html>