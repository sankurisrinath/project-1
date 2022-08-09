<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style1.css"/>
    <title>Flights</title>
    <style>
      #psw{
        margin-bottom: 5px;
      }
    </style>
</head>
<body>

      <?php
      if( isset($_POST['name']) && isset( $_POST['mail']) &&  isset($_POST['psw'])  &&  isset($_POST['address']) &&  isset($_POST['mobile']) &&  isset($_POST['id']) &&  isset($_POST['psw-repeat']) )
      {
    echo "testing";
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
    $psw2 =$_POST['psw-repeat'];
    $adress = $_POST['address'];
    $mobile = $_POST['mobile'];
    $id =$_POST['id'];
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
    echo "line : 21";

    $sql1="select p_password from passenger";
    $result1= mysqli_query($conn,$sql1);
    if(!$result1){
      echo " error : ".mysqli_error($conn);
      exit;
  }
  while($row1=mysqli_fetch_assoc($result1)){
    if($psw = $row1['p_passsword']){
      echo "password already exits
            try another one!";
      exit;
    }
  }
    $sql="INSERT INTO passenger (p_password,p_id,p_name,p_adress,p_email,p_mobile) VALUES('$psw','$id','$name','$adress','$mail','$mobile')";
    echo "23";
    echo "24";
    $result = mysqli_query($conn,$sql);
    echo "$result";
    if(!$result){
        echo " error : ".mysqli_error($conn);
        exit;
    }
    echo "registration successful";
    echo "df";
    echo "df";
    echo "df";
    echo "df";
    echo "df";
    mysqli_close($conn);
  }
  else{
  ?>
  <form method="" action="">
        <div class="container">
          <h1>Register</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
      
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" id="name" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
          <input type="checkbox" onclick="myFunction()">Show Password
          <br>
          <br>
          
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
          <br>
          <br>
          <label for="address"><b>Enter address</b></label>
          <input type="text" placeholder="Enter address" name="address" id="address" required>

          <label for="mobile"><b>Mobile number</b></label>
          <input type="text" placeholder="contact mobile" name="mobile" id="mobile" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="mail" id="mail" required>

          <label for="id"><b>Pan Card Number</b></label>
          <input type="text" name="pan-card" id="id" required>
          <hr>
      
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <button type="submit" class="register">Register</button>
        </div>
      
        <div class="container signin">
          <p>Already have an account? <a href="customer.html" >Sign in</a>.</p>
        </div>
        <div class="container"></div>
      </form>
 <?php }  ?>

      <script>
        function myFunction() {
          var x = document.getElementById("psw");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>
</body>
</html>