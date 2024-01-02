<?php
include('connect.php');
include('participantsession.php');
$category = $_GET['category'];

$sql = "INSERT INTO registered_participants VALUES ('','$category','$user','')";
$result = mysqli_query($con,$sql) or die('Error inserting data into database');
if($result){
    header("location: category.html");//forward to payment.html
}
else{
    echo "Fail to insert data into database";
}

?>