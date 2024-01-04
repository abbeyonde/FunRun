<?php
include('connect.php');
include('participantsession.php');
$category = $_GET['category'];
$paid = $_GET['paid'];

session_start();
if (isset($_SESSION['id'])) {

    $sql = "INSERT INTO registered_participants VALUES ('','$category','$participant','$paid')";
    $sql_limit = "SELECT quota,current_participants FROM categories WHERE id='$category'";
    $result_limit = mysqli_query($con, $sql_limit) or die("Error fetching data from database");
    $limit = mysqli_fetch_array($result_limit);
    if ($limit['current_participants'] < $limit['quota']) {
        $sql_check = "SELECT * FROM registered_participants WHERE participant_ic='$participant'";
        $result_check = mysqli_query($con, $sql_check);
        $row_check = mysqli_fetch_array($result_check);
        if (isset($row_check)) {
            $sql_update = "UPDATE registered_participants SET paid=$paid WHERE participant_ic='$participant'";
            $result_update = mysqli_query($con, $sql_update) or die("fail");
            // $row_update = mysqli_fetch_array($result_update);
            header("location: index.php");

        } else {
            $result = mysqli_query($con, $sql) or die('Error inserting data into database');
            if ($result) {
                $new_p = $limit['current_participants'] + 1;
                $sql_add = "UPDATE categories SET current_participants=$new_p WHERE id=$category";
                $succes_add = mysqli_query($con, $sql_add) or die("Fail to update data into database");
                if (isset($succes_add)) {
                    header("location: index.php"); //forward to payment.html
                } else {
                    echo "Fail update data into database";
                }
            } else {
                echo "Fail to insert data into database";
            }
        }
    } else {
        echo "Category Quota Reached"; //include php for category have reached maximum quota
    }
} else {
echo "<h1>Session Terminated</h1>";
echo "<p>Your session has been expired</p>";
}
?>