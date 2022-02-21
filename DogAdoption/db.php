<?php

function createDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dog_adoption";

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error){
        die("Connection Failed". $conn -> connect_error);
    }

    //create db
    $sql =  "CREATE DATABASE IF NOT EXIST $dbname";

    if(mysqli_query($conn,$sql)){
        createTableDog();
        createTableUsers();
    }else{
        echo "Connection database failed". $conn -> connect_error;
    }
}

function createTableDog(){
    $conn = new mysqli($servername, $username, $password,$dbname);

    $sql = "CREATE TABLE IF NOT EXIST dogs(
        dogId INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        dogImage VARCHAR(255) NOT NULL,
        dogName VARCHAR(50) NOT NULL,
        dogBreed VARCHAR(50) NOT NULL,
        dogGender VARCHAR(10) NOT NULL,
        dogAge VARCHAR(50) NOT NULL,
        dogHeight VARCHAR(50) NOT NULL,
        dogWeight VARCHAR(255) NOT NULL,
        dogPrice FLOAT,
        );
        ";
    if(mysqli_query($conn, $sql)){
        return $conn;
    }else{
        echo "failed";
    }
}
function createTableUsers(){
    $conn = new mysqli($servername, $username, $password,$dbname);

    $sql = "CREATE TABLE IF NOT EXIST users(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(200) NOT NULL,
        email VARCHAR(250) NOT NULL,
        address VARCHAR(250) NOT NULL,
        phone_number VARCHAR(15) NOT NULL,
        password VARCHAR(30) NOT NULL,
        );
        ";
    if(mysqli_query($conn, $sql)){
        return $conn;
    }else{
        echo "failed";
    }
}
function insertDogData(){

    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql = "INSERT INTO MyGuests (dogId,dogImage,dogName,dogBreed,dogGender,dogAge,dogHieght,dogWieght,dogPrice)
    VALUES (2, 'dog2.jpg', 'Max', 'Doberman Pinscher','Male','2', '15 inches','5 kg', '14000')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>