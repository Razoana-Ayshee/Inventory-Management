<?php 

session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	include("function.php");
	$admindata = verify($connection);
	$id=$admindata['id'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
		$unit = $_POST['unit'];
		$price = $_POST['price'];

		

			//read from database
			$query = "insert into product (product_name,product_description,unit,price,id) values 
			     ('$product_name','$product_description','$unit','$price','$id')";
			if($result = mysqli_query($connection, $query)){
			header("Location: add_product.php");
			die;}
			else{
				echo "this product already exists"; 
			}

			
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>add product</title>
	

	
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

	

	</style>
	
	
	
<table align="left" border="0"cellspacing="0" >
<tr>
<td>
<h1>All Products Information</h1>

<table id ="mytable" border="1" cellpadding="13" cellspacing="0">

<?php


$sql = "SELECT * FROM product";
$result = mysqli_query($connection, $sql);


echo "<tr>";
echo "<th>product id</th><th>Product Name</th><th>product description</th><th>unit</th><th> Price</th>";
echo "</tr>";


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
			echo "<td>" . $row['pro_id'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td>" . $row['product_name'] . "</td>";
			echo "<td>" . $row['product_description'] . "</td>";
			echo "<td>" . $row['unit'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
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
				<div style="font-size: 30px;margin: 20px;color: white;">Add Product Information</div>
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
			
				
			<input  id="button" type="submit" value="Add">
				<a href="profile-1.php"><input id="button" value="Back"></a><br><br>
			

		</form>
	</div>
	
 </td>	
       </tr>
	
     </table>
</body>
</html>