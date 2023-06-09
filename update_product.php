<?php 

session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	include("function.php");
	$admindata = verify($connection);


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
		$unit = $_POST['unit'];
		$price = $_POST['price'];

		
					

		$query = "UPDATE product SET product_name='$product_name', product_description='$product_description',unit='$unit',price='$price'WHERE product_name='$product_name'";
			
		if($result = mysqli_query($connection, $query)>0){
		
			header("Location: update_product.php");
			die;
						
			
					

			}	
			else
			{
				echo "this product does not exist  ";
			}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Product </title>
	

	
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

		background:linear-gradient(to right, #000066 -50%, #ff99cc 150%);
		box-shadow: 5px 5px 7px #000066;
	}
	

	</style>
	<br><br><br>
	<div id="box1">
	
<table align="left" border="0"cellspacing="0" >
<tr>
<td>
<h1>All Products Information</h1>

<table id ="mytable" border="1" cellpadding="13" cellspacing="0">

<?php


$sql = "SELECT * FROM product";
$result = mysqli_query($connection, $sql);


echo "<tr>";


echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'product id' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Product Name' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'product description' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'unit' . "</FONT></th>";
echo "<th><FONT COLOR='FFFFFF' style='font-size:20px'>" . 'Price' . "</FONT></th>";

echo "</tr>";


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
			echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['pro_id'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['product_name'] . "</td>";
			echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['product_description'] . "</td>";
			echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['unit'] . "</td>";
			echo "<td><FONT COLOR='FFFFFF' style='font-size:20px'>" . $row['price'] . "</td>";
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
	
	
	
<table align="center" border="0"cellspacing="0" >

<tr>
<td>
	<div id="box">
		
		<form method="post">
				<div style="font-size: 30px;margin: 20px;color: white;">Update Product Information</div>
			<table id ="mytable" border="0" cellpadding="13" cellspacing="0">
			
			
<tr>
				<td>		<div style="font-size: 23px;margin: 20px;color: white;">Product Name :</td>
				<td> <input type="text" name="product_name"placeholder="enter product name" required><br><br></div></td>
				
</tr>


<tr>
				<td><div style="font-size: 23px;margin: 20px;color: white;">Product Description:</td>
				<td><input type="text" name="product_description"placeholder="enter product description" required><br><br></div></td>
				
			</tr>
			<tr>
				<td><div style="font-size: 23px;margin: 20px;color: white;">Unit:</td>
				<td><input type="text" name="unit"placeholder="enter unit" required><br><br></div></td>
				
			</tr>
			<tr>
				<td><div style="font-size: 23px;margin: 20px;color: white;">Price(per unit):</td>
				<td><input type="number" name="price"placeholder="enter product price" required><br><br></div></td>
				
			</tr>


			</table>

			<input  id="button" type="submit" value="update">
			<a href="profile-1.php"><input id="button1" value="                       Back"></a><br><br>
			
		</form>
	</div>
	 </td>	
       </tr>
	
     </table>
	 </div>
</body>
</html>