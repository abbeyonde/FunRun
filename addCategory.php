<?php
include('connect.php');
include('participantsession.php');
$category = $_GET['category'];

$sql = "INSERT INTO registered_participants VALUES ('','$category','$user','')";
$sql_limit = "SELECT quota,current_participants FROM categories WHERE id='$category'";
$result_limit = mysqli_query($con, $sql_limit) or die("Error fetching data from database");
$limit = mysqli_fetch_array($result_limit);
if ($limit['current_participants'] < $limit['quota']) {
    $result = mysqli_query($con, $sql) or die('Error inserting data into database');
    if ($result) {
        $new_p = $limit['current_participants']+1;
        $sql_add = "UPDATE categories SET current_participants=$new_p WHERE id=$category";
        $succes_add = mysqli_query($con, $sql_add) or die("Fail to update data into database");
        if(isset($succes_add)){
        header("location: category.html"); //forward to payment.html
        }
        else{
            echo "Fail update data into database";
        }
    } else {
        echo "Fail to insert data into database";
    }
} else {
    echo "Category Quota Reached"; //include php for category have reached maximum quota
}

?>