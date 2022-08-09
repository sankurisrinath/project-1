<?php
echo "testing";
$name= $_POST['name'];
$psw=$_POST['psw'];
$conn=  mysqli_connect("localhost","root","","airline management");
    if(!$conn){
        echo "connection failed".mysqli_connect_error();
        exit;
    }
    echo "connection successful";
$sql="select * from passenger where p_name like '$name' ";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo 'error'.mysqli_error($conn);
}

while ($row=mysqli_fetch_assoc($result)){
  if($row['p_name']== $name) { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1> details </h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>NAME</th>
				<th>ADRESS</th>
				<th>CONTACT</th>
				<th>EMAIL</th>
			</tr>
        <?php
        $row=mysqli_fetch_assoc($result);
        echo "yo your email is". $row['p_email'] ;
        ?>
        </table>
    </section>
</body>
 
</html>
<?php
  }
  else{ 
    echo "<html>
    <h1> invalid username or psw </h1>
    </html>";
    echo " invalid username or password ";
    
     } 
mysqli_close($conn);

    }?>