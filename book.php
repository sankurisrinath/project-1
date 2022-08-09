<?php 
$conn=mysqli_connect("localhost","root","","airline management");
if(!$conn){
    echo " error: ".mysqli_connect_error();
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING PAGE</title>
    <style>
        h1{
            text-transform: capitalize;
            font-family:Arial, Helvetica, sans-serif ;
        }
        div{
            width: 100%;
            padding: 15px;
            text-align:center;
        }
		table {
			margin: 0 auto;
			font-size: x-large;
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
            input[type=submit]:hover{
                background:#c0ff85 ;
                cursor: pointer;
            }
			
			
			
            input[type=submit]{
                width: 15%;
                padding: 10px 15px 10px 15px;
                margin: 5px 2px 22px 2px;
                border:2px solid #ccc;
                box-sizing:border-box;
                background: #abd187;
                font-weight: bold;
            }
            input[type=text]{
                width: 9%;
                padding: 5px;
                margin: 5px 0 22px 0;
                /* display: inline-block; */
                border:2px solid #ccc;
                box-sizing:border-box;
                background: #E4F5D4;
                font-weight: bold;
}
                span{
                    font-family:Arial, Helvetica, sans-serif ;
                    font-size:large;
                }
                .v {
                 border-left: 6px solid green;
  
                padding: 10px;
}
                .cont{
                    text-align:left;
                    padding-left:20px;
                }
	</style>
</head>
<body>
    <h1> CURRENTLY AVAILABLE FLIGHTS </h1>
    <BR>
        <HR>
    
    <?php
    $sql="select * from flights";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo "error: ".mysqli_error($conn);
        exit;
    }
    $rowcount = mysqli_num_rows($result);
    ?>
    
    <div>
    <table>
        <th>Flight Number</th>
        <th>Flight Name</th>
        <th>From</th>
        <th>To</th>
        <?php
        while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr><td> <?php echo $row['id'] ?></td>   
            <td> <?php echo $row['name'] ?></td>
            <td> <?php echo $row['from'] ?></td>
            <td> <?php echo $row['to'] ?></td></tr>
            <?php
        } ?>                    
        </table>
        <br> 
        </div>
        <hr>
        <h1> BOOK TICKETS </h1>
        <div>
        <form action="booked.php" method="post">
                    <span> <b>Enter the Flight number : </b>    </span>
                    <input type="text" name="flight_no" placeholder="Flight Number" required>
                                        
                    <span><b>Number of Tickets : </b></span>
                    <input type="text" name="tickets" placeholder="Number of Tickets"  required>
                   
                    <br><br>
                   
                      <span><b>Enter your Pan Card Number:</b></span>
                    <input type="text" name="id" placeholder="Pan Card Number"  required>
                   
                    <br>

                    <input type="submit" name="submit" value="DO TRANSACTION"/>

          </form>
    </div>
</body>
</html>