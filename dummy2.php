<?php
$conn= mysqli_connect("localhost","root","","airline management");
if(!$conn)
{
    echo " connection failed";
    exit;
}
$sql="select * from user";
$result = mysqli_query($conn,$sql);
if(!$result)
{
    echo "error ".mysqli_error($conn);
    exit;
}
while($row = mysqli_fetch_assoc($result)){
    echo $row['user_name']."<br>";
}
mysqli_close($conn);
?>