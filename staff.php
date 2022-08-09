<!-- PHP code to establish connection with the localserver -->
<?php
$name = $_POST['username'];
$psw = $_POST['psw'];
$conn= mysqli_connect("localhost","root","","airline management");
if(!$conn)
{
echo " connection failed";
exit;
}


// SQL query to select data from database
$sql = " select u.user_id,u.user_name,u.user_mobile,u.user_email,u.user_adress,l.login_username,l.user_password,r.role_id,r.role_name,r.role_desc,r.role_sal from user u,login l,has h,roles r where h.user_id=u.user_id and h.login_id=l.login_id and h.role_id=r.role_id and l.login_username like '$name' and l.user_password like '$psw'" ;
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
			text-align:center;
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
				<th>USER ID</th>
				<th>USER NAME</th>
				<th>CONTACT</th>
				<th>EMAIL</th>
				<th>ADDRESS</th>
                <th>ROLE ID</th>
                <th>ROLE</th>
                <th>SALARY</th>
			</tr>
        <?php
        $row=mysqli_fetch_assoc($result); ?>
        <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
				<td><?php echo $row['user_id'];?></td>
                <td><?php echo $row['role_name'];?></td>
                <td><?php echo $row['user_mobile'];?></td>
                <td><?php echo $row['user_email'];?></td>
                <td><?php echo $row['user_adress'];?></td>
                <td><?php echo $row['role_id'];?></td>
                <td><?php echo $row['role_desc'];?></td>
                <td><?php echo $row['role_sal'];?></td>
            </tr>
        
        
        </table>
    </section>
	<div>
	<a href="book.php"><button> BOOK TICKETS </button></a>
	</div>
</body>
 
</html>