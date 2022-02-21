<?php
    $conn = new mysqli("localhost", "root", "", "dog_adoption");

    if($conn->connect_error){
        die("Connection Failed". $conn -> connect_error);
    }
    
    $result = array('error'=> false);
    $action = "";

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    //read data
    if($action == "read"){
        $sql = $conn->query("SELECT * FROM users");
        $users = array();

        while($row = $sql->fetch_assoc()){
            array_push($users, $row);
        }

        $result['users'] = $users;
    }

    //create data
    if($action == "create"){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name =isset( $_POST['name']) ? $_GET['name'] : '';
        $email = isset( $_POST['email']) ? $_GET['email'] : '';
        $address = isset( $_POST['address']) ? $_GET['address'] : '';
        $phone_number = isset( $_POST['phone_number']) ? $_GET['phone_number'] : '';
        $password = isset( $_POST['password']) ? $_GET['password'] : '';

        $sql = $conn->query("INSERT INTO users(name,email,address,phone_number,password) VALUES('$name','$email','$address,'$phone_number','$password')");
        
        if($sql){
            $result['message'] = "User Added Sucesfully";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Fail to Add User";
        }
    }
    if($action == "create"){
        $id = $_get['id']
    }


    //update
    if($action == "update"){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];

        $sql = $conn->query("UPDATE users SET name='$name' , email='$email', address='$address', phone='$phone_number, password='$password' WHERE id='$id' ");
        
        if($sql){
            $result['message'] = "User Updated Sucesfully";
        }
        else{
            $result['error'] = true;
            $result['message'] = "User Cannot be Updated";
        }
    }
    //delete
    if($action == "delete"){
        $id = $_POST['id'];

        $sql = $conn->query("DELETE FROM users WHERE id='$id'");
        
        if($sql){
            $result['message'] = "User Deleted succesfully";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Failed to Delete user";
        }
    }
    $conn->close();
    echo(json_encode($result));

?>