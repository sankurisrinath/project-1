 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-transform: capitalize;
            font-family:Arial, Helvetica, sans-serif ;
        }
        div{
            width: 100%;
            padding: 15px;
        }

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
        3
            input[type=submit]:hover{
                background:#c0ff85 ;
                cursor: pointer;
            }
			div{
				text-align:center;
			}
            a{
                font-weight: bold;
                font-family: monospace;
                font-size: 1rem;
                /* background:rgb(100, 201, 23); */
                border: none;
                outline: none;
                border-radius: var(--radius);
                padding: 0.5rem 1rem;
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
	</style>
 </head>
 <body>

<?php
$conn=mysqli_connect("localhost","root","","airline management");
if(!$conn){
    echo " error: ".mysqli_connect_error();
    exit;
}
$flight_no = $_POST['flight_no'];
$tickets = $_POST['tickets'];
$id = $_POST['id'];
$sql="UPDATE passenger set f_id = $flight_no,no_of_tickets=$tickets where p_id like '$id' ";
$result = mysqli_query($conn,$sql);
    if(!$result){
        echo " error : ".mysqli_error($conn);
        exit;
    }
    echo '<h1>'. "TRANSACTION SUCCESSFUL!" .'</h1>'; 


    mysqli_close($conn);
?>    
<span>
    




<a href="index.html">go back to home page</a>
</span>
</body>
 </html>