<?php
  require_once("./db.php");
  createDb();
  include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <style>
		*{
		  padding:0;
		  margin:0;
		  box-sizing: border-box;
	   }
	  
     </style>

</head>
<body>
<!-- nav bar-->
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

  <div class="jumbotron text-center">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="./img/k9.jpg" alt="Los Angeles">
        </div>
        <div class="item">
          <img src="./img/rott.jpg" alt="Chicago">
        </div>

        <div class="item">
          <img src="./img/golden.jpg" alt="New York">
        </div>
      </div>
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 border" style="margin:40px;" >
          <div class="card-body" >
            <p class="card-text text-center" style="margin-top: 30px;"><h4>
            It's easy to find a dog or cat who's right for you at a shelter or rescue group. Share your blessings with everyone, the more the merrier.
            </p></h4>
          </div>
        </div>
        <div class="col-sm-3 border" style="margin:40px;">
          <div class="card-body">
            <p class="card-text text-center" style="margin-top: 30px;"><h4>
              Once you find a pet, click "learn more about me" to get contact info for their shelter or rescue. Contact them to learn more about how to meet and adopt the pet.
            </p></h4>
          </div>
        </div>
        <div class="col-sm-3 border" style="margin:40px;">
          <div class="card-body">
          <p class="card-text text-center" style="margin-top: 30px;"><h4>
          The rescue or shelter will walk you through their adoption process. Prepare your home for the arrival of your dog or cat to help them adjust to their new family.
          </p></h4>
          </div>
        </div>
      </div>
    </div>
</div>
  
<!-- container for the dogs for sale-->
<div class="container">   
  <!-- main panel for the breed image and infos--> 
  
  <!--php code to display dogs -->
  
  <div class="row text-center" >
    <br>
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
    
    <div class="col-md-3 col-sm-3 my-3 ">
      <div class="panel panel-primary" style="width: 270px;height: 500px;">
        <div class="panel-body" style="height: 50%;">
          <img src="upload/<?php echo $dog_image?>"style="width: 100%;height: 100%;" alt="Card One" class="img-thumbnail img-fluid card-img-top">
        </div>
		    <div class="panel-footer" style="height: 50%;">
			    <h3 class="panel-title">Php <?php echo $dog_price; ?></h3>
			    <p class="panel-text">
            Name : <?php echo $dog_name; ?><br>
            Breed : <?php echo $dog_breed; ?> <br>
            Sex : <?php echo $dog_gender; ?><br>
            Age : <?php echo $dog_age; ?> year old<br>
            Height: <?php echo $dog_height; ?> inches<br>
            Weight: <?php echo $dog_weight; ?> kg
          </p>
			    <a href="#" class="btn btn-primary">Adopt</a>
		    </div>
      </div>
    </div>
    <?php endwhile ?>
  </div><br>
  </div>

  <div class="jumbotron text-center" style="margin-bottom:0">
  <!-- Footer Text -->
    <div class="row ">
        <h3 class="text-center">
        <p>“Saving one dog will not change the world, but surely for that one dog, the world will change forever.”</p>
        </h3>
        <br>
  </div>
  <script src="app.js"></script>
</body>
</html>