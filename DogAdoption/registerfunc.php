<?php

    
    $conn = new mysqli("localhost", "root", "", "dog_adoption");

    if($conn->connect_error){
        die("Connection Failed". $conn -> connect_error);
    }


    if(isset($_POST['submit'])){

        $fullname = $_POST["full_name"];
        $email = $_POST["email"];
        $phone_number = $_POST["phone_number"];
        $address = $_POST["address"];
        $password = $_POST["password"];

        require_once 'db.php';

        $sql = "INSERT INTO users(username,email,address,phone_number,password) 
        VALUES('$fullname','$email','$address','$phone_number','$password')";



        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }  
    }
    else{
        header("location: ./login.php");
        exit();
    }

