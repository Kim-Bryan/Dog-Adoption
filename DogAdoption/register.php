

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
		<div class="col-lg-5">
		   <img src="./img/pic-login.png" class="img-fluid" alt="">
		</div>
		<div class="col-lg-7 px-5 pt-5">
		   <h1 class="font-weight-bold py-3">Sign Up Now</h1>
		   <form id="register" name="register" action="register.php" onsubmit="return checkInputs()" method="POST">
		      	<div class="form-group">
					<div class="col-lg-12">
			   			<input type="text" id="fullname" name="full_name" placeholder="Full Name" class="form-control my-3 p-4">
					</div>
		      	</div>
		    	<div class="form-group">
					<div class="col-lg-12">
					</div>
		      	</div>
		      	<div class="form-group">
					<div class="col-lg-12">
			   			<input type="email" id="email" name="email" placeholder="Email Address" class="form-control my-3 p-4">
					</div>
		      	</div>
		      	<div class="form-group">
					<div class="col-lg-12">
			   			<input type="text" id="phonenumber" name="phone_number" placeholder="Phone Number" class="form-control my-3 p-4">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-lg-12">
			   			<input type="text" id="address" name="address" placeholder="Address" class="form-control my-3 p-4">
					</div>
		      	</div>
		      	<div class="form-group">
					<div class="col-lg-12">
			   			<input type="password" id="password" name="password" placeholder="Password" class="form-control my-3 p-4">
					</div>
					<div class="col-lg-12">
						<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="form-control my-3 p-4">
			 		</div>
		      	</div>
		      	<div class="form-group">
					<div class="col-lg-12">
			   			<button type="submit" name="submit"id="submit" class="btnSubmit mt-3 mb-5">Sign Up</button>
					</div>
		      	</div>
			   	</form>	
				   
				   <script>
						function checkInputs(){
							//get value of inputs
							const usernameValue = document.forms["register"]["full_name"].value.trim();
							const emailValue = document.forms["register"]["email"].value.trim();
							const phoneValue = document.forms["register"]["phone_number"].value.trim();
							const addressValue = document.forms["register"]["address"].value.trim();
							const passwordValue = document.forms["register"]["password"].value.trim();
							const confrimPassValue = document.forms["register"]["confirmPassword"].value.trim();
						
							if(usernameValue == ''){
								
								alert("invalid input please try again");
								return false;
							}
							if(emailValue == ''){
								alert("invalid input please try again");
								return false;
							}
							if(addressValue === ''){
								alert("invalid input please try again");
								return false;
							}
							if(phoneValue < 11){
								alert("phone number should be 11 character long");
								return false;
							}
							if(passwordValue !=confrimPassValue){
								alert("password doesnot match");
								return false;
							}
							else{
								return true;
								<?php  header("location: index.php"); ?>
							}
					}
					
				   </script>

			</div>
	      </div>
	   </div>
	</section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	-->
  </body>
</html>