<?php 
session_start();

	include("connection.php");
	include("function.php");
	$admindata = verify($connection);
	$id=$admindata['id'];


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		$new_password = $_POST['new_password'];
		$con_new_password = $_POST['con_new_password'];
		$old_pass = $_POST['old_pass'];

		//echo $con_new_password;
		
		$query1 = "select * from admin where id = '$id'";
			$result1 = mysqli_query($connection, $query1);
			if($result1 && mysqli_num_rows($result1) > 0)
				{

					$admin_info = mysqli_fetch_assoc($result1);
					$pass=$admin_info['password'];
					if($pass===$old_pass){
		
						//echo $pass;
		
							if($con_new_password===$new_password)
							{
		

							
								$query = "UPDATE admin SET password='$new_password' WHERE id='$id'";

								mysqli_query($connection, $query);
			
			

								header("Location: profile-1.php");
								die;

							}
							else
							{
								echo "new Password did not Match";
		
							}
				
					}else{
						echo "old pass did not match" ;
					}
				
				}
		
			else
			{
				echo "wrong  ";
			}
	
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>change password</title>
	
		


</head>
<body style= "background: 
           linear-gradient(to bottom left, #000066 50%, #ff99cc 50%);">

	<style type="text/css">
	
	
	#box{

		 background: linear-gradient(to right, #003366 -60%, #cc99ff 65%);
		margin: 320px;
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

<table align="center" border="0"cellspacing="0" >
<tr>
<td>
	<div id="box">
	

		<form method="post">
		
		<div style="font-size: 30px;margin: 20px;color: white;">change password</div>
			<table id ="mytable" border="0" cellpadding="13" cellspacing="0">
			
			
<tr>
				<td>		<div style="font-size: 23px;margin: 20px;color: white;">Old Password:</td>
				<td> <input id="text" type="password" name="old_pass"placeholder="enter old password" required><br><br></div></td>
				
</tr>
<tr>
				<td>		<div style="font-size: 23px;margin: 20px;color: white;">Password:</td>
				<td> <input id="text" type="password" name="new_password"placeholder="enter new password" required><br><br></div></td>
				
</tr>
<tr>
				<td>		<div style="font-size: 23px;margin: 20px;color: white;">Confirm Password:</td>
				<td> <input id="text" type="password" name="con_new_password"placeholder="confirm new password" required><br><br></div></td>
				
</tr>
		
			
<tr>
				<td><input id="button" type="submit" value="change"></td>
				<td><a href="profile-1.php"><input id="button1" value="                Back"></a></td>
</tr>	
	
		</form>
	</div>
</body>
</html>