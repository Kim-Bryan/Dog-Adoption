
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title></title>
    <style>
      *{
		padding:0;
		margin:0;
		box-sizing: border-box;
	   }
	   body{
		background: #C4F2ED;
   	   }
	   .row{
		background: white;
		border-radius:30px;
		box-shadow: 12px 12px 22px grey;
	   }
	   img{
		border-top-left-radius: 30px;
		border-bottom-left-radius: 30px;
	   }
	   .btnSubmit{
		border: none;
		outline: none;
		height: 50px;
		width: 100%;
		background-color: black;
		color: white;
		border-radius: 4px;
		font-weight: bold;
	   }
	   .btnSubmit:hover{
		background: white;
		border:1px solid;
		color: black;
	   }
    </style>
  </head>
  <body>
  
	<section class="form my-4 mx-5">
	   <div class="container">
	      <div class="row no-gutters">
		<div class="col-lg-4">
		   <img src="./img/pic-login.png" class="img-fluid" alt="">
		</div>
		<div class="col-lg-7 px-5 pt-5">
		   <h1 class="font-weight-bold py-3">Logo</h1>
		   <h4>Sign into your Account</h4>

		   <form id="login" name="login" action="" method="post" onsubmit="return checkInputs()">
		      <div class="form-row">
			<div class="col-lg-7">
			   <input type="email" name="email" placeholder="Email-Address"class="form-control my-3 p-4">
			</div>
		      </div>
		      <div class="form-row">
			<div class="col-lg-7">
			   <input type="password" name="password" placeholder="Password"class="form-control my-3 p-4">
			</div>
		      </div>
		      <div class="form-row">
			<div class="col-lg-7">
			   <button type="submit" name="submit" class="btnSubmit mt-3 mb-5" onclick="hideAdddog()">Login</button>
			</div>
		      </div>
		      <p> Don't have an account? <a href="register.php">Register Here</a></p>
		   </form>	
		   <?php
		   	 $conn = mysqli_connect('localHost','root','','dog_adoption');
				
		   ?>
		<script>
			function checkInputs(){
				//get value of inputs
				const emailValue = document.forms["login"]["email"].value.trim();
				const passwordValue = document.forms["login"]["password"].value.trim();
				
				
				if(emailValue == ''){
					alert("invalid input please try again");
					return false;
				}
				
				if(passwordValue ''){
					alert("password is empty");
					return false;
				}
				else{
					<?php
						include("config.php");
						session_start();
						
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							// email and password sent from form 
							
							$myemail = mysqli_real_escape_string($conn, $_POST['email']);
							$mypassword = mysqli_real_escape_string($conn, $_POST['password']); 
							
							

							$sql = "SELECT id FROM users WHERE email = '$myemail' and password = '$mypassword'";
							$result = mysqli_query($conn,$sql);
							$row = $result->fetch_array(MYSQLI_ASSOC);
							
							$count = mysqli_num_rows($result);
							
							
							// If result matched $myemail and $mypassword, table row must be 1 row

							if($count == 1) {
							
								$_SESSION['login_user'] = $myemail;
								$_SESSION['username'] = $myname;
								
								header("location: index.php");
								}else {
								$error = "Your Login Name or Password is invalid";
							}
						}
						?>
				}
			}
		
		</script>
		</div>
	      </div>
	   </div>
	</section>
	<script src="app.js"></script>
  </body>
</html>