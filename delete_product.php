<?php 

session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	include("function.php");
	$admindata = verify($connection);


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$product_name = $_POST['product_name'];
		
$query0 = "select * from product where product_name= '$product_name' ";
		

		$re = mysqli_query($connection,$query0);
		if($re && mysqli_num_rows($re) > 0)
		{

			$pro_info = mysqli_fetch_assoc($re);
			$pro_id=$pro_info['pro_id'];
			
			
			
			//echo "hi";
		$sql1 = "SELECT * FROM purchase where pro_id='$pro_id'";
		$result1 = mysqli_query($connection, $sql1);
		if (mysqli_num_rows($result1) > 0) {
  //  echo "hi";
			while($row1 = mysqli_fetch_assoc($result1)) {
				$query1 ="delete  from purchase WHERE pro_id='$pro_id'";
				$q1 = mysqli_query($connection, $query1);
			}
		}
		
		
		
		$sql2 = "SELECT * FROM sale where pro_id='$pro_id'";
		$result2 = mysqli_query($connection, $sql2);
		if (mysqli_num_rows($result2) > 0) {
    //  echo "hi";
			while($row2 = mysqli_fetch_assoc($result2)) {
				$query2 ="delete from sale WHERE pro_id='$pro_id'";
				$q2 = mysqli_query($connection, $query2);
			}
		}
		
		
		
		$sql3 = "SELECT * FROM total where pro_id='$pro_id'";
		$result3 = mysqli_query($connection, $sql3);
		if (mysqli_num_rows($result3) > 0) {
    //  echo "hi";
			while($row3 = mysqli_fetch_assoc($result3)) {
				$query3 ="delete  from total WHERE pro_id='$pro_id'";
				$q3 = mysqli_query($connection, $query3);
			}
		}
		
					

						$query ="delete from product WHERE pro_id='$pro_id'";
			
						$result = mysqli_query($connection, $query);
						header("Location: delete_product.php");
					die;
						
			
			
			
			
		}
		  
			
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>delete product</title>
	

	
</head>
<body style= "background: 
           linear-gradient(to left, #000066 -50%, #ff99cc 50%);">

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

		background-color: #1E5A8766;
		height: 90000px;
		
	}
<!--  The HTML <div> tag is used for defining a section of your document. With the div tag,
 you can group large sections of HTML elements together and format them with CSS. -->
	</style>
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
			Delete Product
			<table id ="mytable" border="1" cellpadding="13" cellspacing="0">
			<tr>
				<td><div style="font-size: 23px;margin: 20px;color: white;">Product Name:</td>
				<td><input type="text" name="product_name"placeholder="enter product name" required><br><br></div></td>
				
			</tr>
		
			</table>

			<input  id="button" type="submit" value="Delete">
			
			<a href="profile-1.php"><input id="button1" value="                Back"></a>
		</form>
	</div>
  </td>	
    </tr>
     </table>
	 </div>
</body>
</html>