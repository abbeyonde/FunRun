<?php
include("connect.php");
if(isset($_SESSION['id']))
{
    if($_SESSION['role'] == 'ADMIN'){

    }
    else{
        echo "You're not authorized to access this features.";
    }
}
else{
    echo "Session Terminated";
}

$id = $_GET['id'];
$sql = "DELETE FROM participants WHERE id=$id";
$result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result);
if(isset($result)){
    header("location: admindashboard.php");
}
else{
    echo "ERROR: Fail to perform operation";
}
?>