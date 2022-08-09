<!-- PHP code to establish connection with the localserver -->
<?php
$name = $_POST['name'];
$psw = $_POST['psw'];
$conn= mysqli_connect("localhost","root","","airline management");
if(!$conn)
{
echo " connection failed";
exit;
}


// SQL query to select data from database
$sql = "SELECT p.p_name,p.p_adress,p.p_mobile,p.p_email,f.id,f.name,f.from,f.to,f.amount*p.no_of_tickets as amount from passenger as p left join flights as f on p.f_id=f.id where p.p_name like '$name' and p.p_password like '$psw'";
// SELECT * FROM passenger where p_name like '$name' and p_password like '$psw'
$result = mysqli_query($conn,$sql);
if(!$result){
    echo " error: ".mysqli_error($conn); 
}

?>
<!-- HTML code to display data in tabular format -->


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
        h1{
            text-transform: capitalize;
            font-family:Arial, Helvetica, sans-serif ;
        }
        div{
            width: 100%;
            padding: 15px;
        }
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
			div{
				text-align:center;
			}

	</style>
</head>

<body>
    <div >
        <h1> WELCOME <?php echo $name; ?>! </h1>
    </div>
	<section>
		<h1> details </h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>NAME</th>
				<th>ADRESS</th>
				<th>CONTACT</th>
				<th>EMAIL</th>
				<th>FLIGHT ID</th>
				<th>FLIGHT NAME</th>
				<th>FROM</th>
				<th>TO</th>
				<th>TOTAL AMOUNT</th>
			</tr>
        <?php
        $row=mysqli_fetch_assoc($result); ?>
        <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $row['p_name'];?></td>
                <td><?php echo $row['p_adress'];?></td>
                <td><?php echo $row['p_mobile'];?></td>
				<td><?php echo $row['p_email'];?></td>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['from'];?></td>
				<td><?php echo $row['to'];?></td>
				<td><?php echo $row['amount'];?></td>
            </tr>
        
        
        </table>
    </section>

	<div>
	<a href="book.php"><button> BOOK TICKETS </button></a>
	</div>
</body>
 
</html>