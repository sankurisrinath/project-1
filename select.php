<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUCCESS</title>
        <style>
            button{
                font-weight: bold;
                font-family: monospace;
                font-size: 1rem;
                background:rgb(100, 201, 23);
                border: none;
                outline: none;
                border-radius: var(--radius);
                padding: 0.5rem 1rem;
                cursor: pointer;
            }
            button:hover{
                background:chartreuse ;
            }

        </style>
</head>




<?php
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
    $psw2 =$_POST['psw-repeat'];
    $adress = $_POST['address'];
    $mobile = $_POST['mobile'];
    $id =$_POST['pan-card'];
    if($psw != $psw2){
        echo "password mismatch";
        exit;
    }

    // database connection
    $conn=  mysqli_connect("localhost","root","","airline management");
    if(!$conn){
        echo "connection failed".mysqli_connect_error();
        exit;
    }
        $query="select p_password,p_id from passenger";
        $blah= mysqli_query($conn,$query);
       if(!$blah){
            echo " error : ".mysqli_error($conn);
            exit;
        }
        while($col=mysqli_fetch_assoc($blah)){
            if($psw == $col['p_password']){
                echo '<h1>'.'<img src="warning.jpg"height="30px">'." ERROR : <BR>PASSWORD ALREADY EXISTS <br> TRY ANOTHER ONE !".'</h1>'.'<br>';}
            if($id == $col['p_id']){
                echo '<h1>'.'<img src="wat.jpg"height="30px">'."ERROR :<BR> PAN CARD NUMBER ALREADY EXISTS. <br> TRY ANOTHER ONE !".'</h1> <br>';    
                exit;
        }
        }
   
    $sql="INSERT INTO passenger (p_password,p_id,p_name,p_adress,p_email,p_mobile) VALUES('$psw','$id','$name','$adress','$mail','$mobile')";
    
    $result = mysqli_query($conn,$sql);
    echo "$result";
    if(!$result){
        echo " error : ".mysqli_error($conn);
        exit;
    }
    echo '<h1>'. "REGISTRATION SUCCESSFUL !" .'</h1>'; 

    mysqli_close($conn);
?>
<a href="book.php"><button name="book"> BOOK TICKETS </button></a>
</html>