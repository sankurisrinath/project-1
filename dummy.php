<?php
 $conn=  mysqli_connect("localhost","root","","test");
 if(!$conn){
     echo "connection failed".mysqli_connect_error();
     exit;
 }
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $id =$_POST['id'];

    
   
    
    echo "line : 16";
    $sql="INSERT INTO users (name,email,password) VALUES('$name','$mail','$psw')";
    echo "18";
    echo "19";
    $result = mysqli_query($conn,$sql);
    echo "$result";
    if(!$result){
        echo " error : ".mysqli_error($conn);
        exit;
    }
    echo "registration successful";
    mysqli_close($conn);
?>