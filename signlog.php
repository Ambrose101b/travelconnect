<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into registeration(name, email, password) values(?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);     
        $stmt->execute();
        echo "registration successful";
        $stmt->close();
        $conn->close();
    }
?>
