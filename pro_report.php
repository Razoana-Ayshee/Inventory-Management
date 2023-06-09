<?php
session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	include("function.php");
	$admindata = verify($connection);
?>
<!DOCTYPE html>
<html>
<head>
	<title>product based transaction</title>
	<style>
	body {
				
				background-image: url('2.jpg');
				background-repeat: no-repeat;
				
			
			}

#mytable {
  border-collapse: collapse;
  
  border: 1px solid #ddd;
}

	#box{

		background: linear-gradient(to top, #000066 0%, #ffffff 101%);
		margin: auto;
		width: 230px;
		padding: 50px;
		box-shadow: 2px 2px 5px black;
	}


	</style>
</head> 

<body style=" background: linear-gradient(to bottom left, #000066 0%, #ff99cc 100%);">
		<form  method="POST">
	
	<div style="font-size: 20px;margin: 10px;color: orange;">Enter product name: </div><input id="text"  name="product_name"><br><br>

	<input id="button" type="submit" value="ENTER">
	<a href="purchase_sale_entry.php"><input id="button" value="                Back"></a><br><br>
	</form>
	
</div>

<table align="left" border="1"cellspacing="0"cellpadding="10"  style= "box-shadow: 2px 2px 5px black">
<tr style=" background: linear-gradient(to top right, #000066 -100%, #cc99ff 111%);">
<td>
<h1>Date based purchase transaction</h1>

<table id ="mytable"  border="1" cellpadding="15" cellspacing="0">

<?php

$total_pro_pur=0;
$total_expense=0;
$total_pro_sale=0;
$total_income=0;
$tot_pro=0;
$tot_loss=0;
$count= array();
$pro= array();
$i=1;



if($_SERVER['REQUEST_METHOD'] =="POST")
	{
		$product_name = $_POST['product_name'];
		
		$sql = "SELECT * FROM product where product_name='$product_name'";
$result = mysqli_query($connection, $sql);


echo "<tr>";
echo "<th>purchase id</th><th>Product Name</th><th>Quantity</th><th>purchase date</th><th>Price</th>";
echo "</tr>";


  $row = mysqli_fetch_assoc($result);
		
		$pro_id=$row['pro_id'] ;
		$sql5 = "SELECT * FROM purchase where pro_id='$pro_id' ";
		$result5 = mysqli_query($connection, $sql5);
		
		if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)) {
		
            echo "<tr>";
			echo "<td>" . $row5['purchase_id'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td>" . $row['product_name'] . "</td>";
			echo "<td>" . $row5['quantity'] . "</td>";
			echo "<td>" . $row5['date'] . "</td>";
			echo "<td>" . $row5['price'] . "</td>";
			echo "</tr>";
			$total_pro_pur=$total_pro_pur+$row5['quantity'] ;
			$total_expense=$total_expense+$row5['price'];
			
    }
	
} else {
    echo "0 results";
}

	}
?>

</table>
</td>	
	</tr>	
		<tr style=" background: linear-gradient(to top right, #ff6699 0%, #ffcc66 100%);">
<td>
		<?php echo "Total purchased product =$total_pro_pur";?><br>
		<?php echo "Total expenses  =$total_expense" ;?>
		
		<?php	
		$arrLength = count($count);
		for($i=1;$i<=$arrLength;$i++){
			
			echo "<br>";
				echo "total " .$count[$i]. " purchase = ";
				echo " ";
				echo $pro[$i];
			}
		
		?>
		</td>	
		</tr>
		
		</table>
		
		
		
	
<table align="right" border="1"cellspacing="0" cellpadding="10" style= "box-shadow: 2px 2px 5px black" >
<tr style=" background: linear-gradient(to left, #000066 -100%, #cc99ff 111%);">
<td>
<h1>Date based Sale transaction</h1>

<table id ="mytable" border="1" cellpadding="14" cellspacing="0">

<?php

$count_s= array();
$pro_s= array();
$i=1;


if($_SERVER['REQUEST_METHOD'] =="POST")
	{
		$product_name = $_POST['product_name'];
$sql = "SELECT * FROM product where product_name='$product_name'";
$result = mysqli_query($connection, $sql);


echo "<tr>";
echo "<th>Sale id</th><th>Product Name</th><th>Sale Quantity</th><th>Sale date</th><th>Sale Price</th>";
echo "</tr>";


    
    $row = mysqli_fetch_assoc($result);
		
		$pro_id=$row['pro_id'] ;
		$sql5 = "SELECT * FROM sale where pro_id='$pro_id' ";
		$result5 = mysqli_query($connection, $sql5);
		
		if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)) {
		
            echo "<tr>";
			echo "<td>" . $row5['sale_id'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td>" . $row['product_name'] . "</td>";
			echo "<td>" . $row5['sale_quantity'] . "</td>";
			echo "<td>" . $row5['sale_date'] . "</td>";
			echo "<td>" . $row5['sale_price'] . "</td>";
			
			echo "</tr>";
			
			
			$total_pro_sale=$total_pro_sale+$row5['sale_quantity'] ;
			$total_income=$total_income+$row5['sale_price'];
			
			

    }
}
else {
    echo "0 results";
}	
	}

	

?>

</table>

</td>	
		</tr>
		
		<tr style=" background: linear-gradient(to top right, #ff6699 0%, #ffcc66 100%);">
		
<td>

		<?php echo "Total sale product=$total_pro_sale";?><br>
		<?php echo "Total income  =$total_income" ;?>
		<?php	
		$arrLength = count($count_s);
		for($i=0;$i<$arrLength;$i++){
			echo "<br>";
				echo "total " .$count_s[$i]. " sale = ";
				echo " ";
				echo $pro_s[$i];
			}
		
		?>
		</td>	
		</tr>
		
		</table>
		
		
		<div id="box">
	<table align="center" border="0"cellspacing="0" cellpadding="15" >
<tr style=" background: linear-gradient(to top right, #ff6699 0%, #ffcc66 100%);">
<td>		
	<?php
	
if($total_income>$total_expense){
	
	$tot_pro=$total_income-$total_expense;
	$tot_loss=0;
	//echo "Study PHP at " . $txt2 . "<br>";
	echo "<FONT COLOR=black style='font-size:25px'> total profit :".$tot_pro. "</FONT><br>";
	echo "<FONT COLOR=black style='font-size:25px'> total loss : ".$tot_loss."</FONT><br>";
}
	else if($total_income<$total_expense){
		$tot_pro=0;
	$tot_loss=$total_expense-$total_income;
		echo "<FONT COLOR=black style='font-size:25px'> total profit :".$tot_pro. "</FONT><br>";
echo "<FONT COLOR=black style='font-size:25px'> total loss : ".$tot_loss."</FONT><br>";
	}
	
	else{
		$tot_pro=0;
	$tot_loss=0;
echo "<FONT COLOR=black style='font-size:25px'> Total profit :".$tot_pro. "</FONT><br>";
	echo "<FONT COLOR=black style='font-size:25px'> Total loss : ".$tot_loss."</FONT><br>";
		
	}
	
	
	mysqli_close($connection);
	?>
		
	</td>	
		</tr>
		</table>	
		
	</div>
	<button onclick="window.print()">Print</button><br><br>	
</body>
</html>