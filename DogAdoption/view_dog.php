

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>View dogs</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style>
		*{
		padding:0;
		margin:0;
		box-sizing: border-box;
	   }
	   .row{
		background: white;
		border-radius:20px;
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

  <nav class="navbar navbar-inverse navbar-expand-md navbar-fixed-top">
      <h4 class="navbar-brand" href="/index.php">Golden Dog</h4>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav">
        <li><a href="./index.php">Home</a></li>
      </ul> 
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav navbar-right">
          
          <?php 
            if(isset($_SESSION['login_user'])){
              $isAdmin = $_SESSION['login_user'];
              $link = "logout.php";
              $link2 = "login.php";
              $admin = "Admin@admin.com";
              $view = "view_dog.php";
              if($isAdmin === $admin){
                echo "<li><a href='$link' >Logout</a></li>";
                echo "<li><a href='$view' >Add dog</a></li>";
              }elseif($isAdmin){
                echo "<li><a href='$link'>Logout1</a></li>";
              }
              else{
                echo "<li><a href='$link2'>Login</a></li>";
              }
            }
          ?>
          
        </ul>
    </div>
</nav>
<br><br><br><br><br>
  
  
<?php 

session_start();
$dogId = 0;
$image = "";
$name = "";
$breed = "";
$gender = "";
$age = "";
$height = "";
$weight = "";
$price = "";
$update = false;
    $conn = new mysqli("localhost", "root", "", "dog_adoption");
//delete data
    if(isset($_GET['delete'])){
        $id= $_GET['delete'];
        $sql =("DELETE FROM dogs WHERE dogId='$id'");
        $conn->query($sql);

            $_SESSION['message']="Record has been deleted1";
            $_SESSION['msg_type'] = "danger";
        
        header("location: view_dog.php");
    }
//edit data
    if(isset($_GET['edit'])){
        $dogId = $_GET['edit'];
        $update = true;
        $result = $conn->query("SELECT * FROM dogs WHERE dogId=$dogId");
        if($result){
            $row_dog = $result->fetch_array();
            $image = $row_dog['dogImage'];
            $name = $row_dog['dogName'];
            $breed = $row_dog['dogBreed'];
            $gender = $row_dog['dogGender'];
            $age = $row_dog['dogAge'];
            $height = $row_dog['dogHeight'];
            $weight = $row_dog['dogWeight'];
            $price = $row_dog['dogPrice'];  
            
        }
            
    }
    
    if(isset($_POST['update'])){
        $dogId = $_POST['dog_id'];
        $eimage = $_FILES['image']["name"];
        $etmp_name = $_FILES["image"]["tmp_name"];
        $ename = $_POST["name"];
        $ebreed = $_POST["breed"];
        $egender = $_POST["gender"];
        $eage = $_POST["age"];
        $eheight = $_POST["height"];
        $eweight = $_POST["weight"];
        $eprice = $_POST["price"];

        $sql = "UPDATE dogs SET dogImage='$eimage',dogName='$ename',dogBreed='$ebreed',dogGender='$egender',dogAge='$eage',dogHeight='$eheight',dogWeight='$eweight',dogPrice='$eprice' WHERE dogId='$dogId'";
        echo $id;
        if ($conn->query($sql) === TRUE) {
            echo "New record edited successfully";
            move_uploaded_file($etmp_name,"upload/$eimage");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        header("location: view_dog.php");
    }
    
    
?>       
<?php
        if(isset($_SESSION['message'])):?>

        <div class="alert alert-<?php=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        <?php endif?> 
	   <div class="container">
	      <div class="row no-gutters">
		        <div class="col-lg-12 px-5 pt-5">
                    <?php
                    if($update == true):
                    ?>
                    <h2>EDIT</h2>  
                    <?php else:?>
                        <h2>ADD</h2>  
                    <?php endif; ?>
                    
                        <form id="register" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="dog_id" value="<?php echo $dogId;?>">
                        </div>
                        <div class="form-group">
					        <div class="col-lg-12">
                                <label>Image: </label>
                                <input type="file" name="image" value="upload/<?php echo $image?>" placeholder="Name" class="form-control">
					        </div>
		      	        </div>
		      	        <div class="form-group">
					        <div class="col-lg-12">
			   			        <input type="name" id="name" name="name" value="<?php echo $name; ?>" placeholder="Name" class="form-control my-3 p-4">
					        </div>
		      	        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="text" id="breed" name="breed" value="<?php echo $breed?>" placeholder="Breed" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="radio" name="gender" value="Male" checked>Male
                                
                                <input type="radio" name="gender" value="Female">Female
                            </div>
		      	        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="text" id="age" name="age" value="<?php echo $age?>" placeholder="age" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="text" id="height" name="height" value="<?php echo $height?>" placeholder="height in Inches" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="text" id="weight" name="weight" value="<?php echo $weight?>" placeholder="weight in Kilograms" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="number" id="price" name="price" value="<?php echo $price?>" placeholder="price" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <?php
                                if($update == true):
                                ?>
                                <button type="submit" name="update" id="submit" class="btnSubmit mt-3 mb-5">Update</button>
                                <?php else:?>
                                <button type="submit" name="btnsubmit"id="submit" class="btnSubmit mt-3 mb-5">Add</button>
                                <?php endif; ?>
                            </div>
                        </div>
			   	    </form>	
                    <?php
                        $conn = new mysqli("localhost", "root", "", "dog_adoption");

                        if($conn->connect_error){
                            die("Connection Failed". $conn -> connect_error);
                        }


                        if(isset($_POST['btnsubmit'])){

                            $image = $_FILES["image"]["name"];
                            $tmp_name = $_FILES["image"]["tmp_name"];
                            $name = $_POST["name"];
                            $breed = $_POST["breed"];
                            $gender = $_POST["gender"];
                            $age = $_POST["age"];
                            $height = $_POST["height"];
                            $weight = $_POST["weight"];
                            $price = $_POST["price"];


                            $sql = "INSERT INTO dogs(dogImage,dogName,dogBreed,dogGender,dogAge,dogHeight,dogWeight,dogPrice) 
                            VALUES('$image','$name','$breed','$gender','$age','$height','$weight','$price')";


                            if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                            move_uploaded_file($tmp_name,"upload/$image");
                            } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            
                        }
                    ?>

			</div>
	      </div>
        </div><hr>
        


<div class="container">
            <h2>Dogs Table</h2>           
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                        $conn = new mysqli("localhost", "root", "", "dog_adoption");

                        if($conn->connect_error){
                            die("Connection Failed". $conn -> connect_error);
                        }
                        $select = "SELECT * FROM dogs";
                        $run = mysqli_query($conn,$select);


                        while($row_dog = $run->fetch_assoc()):

                            $dog_id = $row_dog['dogId'];
                            $dog_image = $row_dog['dogImage'];
                            $dog_name = $row_dog['dogName'];
                            $dog_breed = $row_dog['dogBreed'];
                            $dog_gender = $row_dog['dogGender'];
                            $dog_age = $row_dog['dogAge'];
                            $dog_height = $row_dog['dogHeight'];
                            $dog_weight = $row_dog['dogWeight'];
                            $dog_price = $row_dog['dogPrice'];
                    ?>
                <tr>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_id; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><img src="upload/<?php echo $dog_image; ?>" height="70px" class="img-thumbnail"> </td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_name; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_breed; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_gender; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_age; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_height; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_weight; ?></td>
                    <td data-id="<?php echo $dog_id; ?>"><?php echo $dog_price; ?></td>
                    <td>
                        <a href="view_dog.php?edit=<?php echo $dog_id; ?>" class="btn btn-info">Edit</a>
                    </td>
                    <td>
                        <a href="view_dog.php?delete=<?php echo $dog_id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                    
                </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            
    </div>
    

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