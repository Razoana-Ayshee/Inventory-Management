<?php 

session_start();//A session is a way to store information (in variables) to be used across multiple pages
	
	include("connection.php");
	


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from admin where username = '$username'";
			$result = mysqli_query($connection, $query);
			

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_info = mysqli_fetch_assoc($result);
					
					if($admin_info['password'] === $password)
					{

						$_SESSION['id'] = $admin_info['id'];
						header("Location: profile-1.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username ";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	

	
</head>
<body style=" background: linear-gradient(to right, #9999ef 52%, #ccccee 52%);">

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
	
#box{

		background: linear-gradient(to right, #ccccff 54.4%, #9999ff 54%);
		margin: auto;
		width: 700px;
		height:410px;
		box-shadow: 6px 6px 7px #000066;
	}
	</style>

<br><br><br><br><br><br><br><br><br>
 <div id= "box">
<table align="left" border="0"cellspacing="0"   >
<tr>
<td width= "500px"height="340px">
	<form method="post">
			<div style="font-size: 30px;margin: 20px;color: white;"> Login</div>
			
			<div style="font-size: 25px;margin: 20px;color: white;">User Name:<input id="text" type="text" name="username"placeholder="enter your name" required ><br><br></div>
			<div style="font-size: 25px;margin: 20px;color: white;">Password :  <input id="text" type="password" name="password"placeholder="password" required ><br><br></div>

			<br>
			
			
</div>
		
		</td>
		
		<td width= "375px"height="340px"><h1 style=" text-shadow : 2px 2px 2px black">     J o i n  <?php echo "  <br>"; ?> t o <br><br> A d m i n   <?php echo "  <br>";?>   P a n e l </h1></td>
		</tr>
		
		
	
<tr>
<td align="center"><input id="button1" type="submit" value="Login"></td><br><br>

<td align="center"><a href="home.php"><input id="button" value="                        Home"></a></td><br>
		</tr>
		</table>

	
	</form>
</body>
</html>