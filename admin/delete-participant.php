<?php
include("connect.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
    $id = $_GET['id'];
    $ic = $_GET['ic'];
    
    $sql_cat = "SELECT * FROM registered_participants WHERE participant_ic=$ic";
    $result_cat = mysqli_query($con, $sql_cat);
    $cat = mysqli_fetch_array($result_cat);
    if (isset($cat)) {
        $category_id = $cat["category_id"];
        $sql_check = "SELECT current_participants FROM categories WHERE id=$category_id";
        $result_check = mysqli_query($con, $sql_check);
        $total_p = mysqli_fetch_array($result_check);
        // echo "$total_p[current_participants]";
        $new_p = $total_p["current_participants"] - 1;
        // echo "$new_p";
        $sql_update = "UPDATE categories SET current_participants=$new_p WHERE id=$category_id";
        $result_update = mysqli_query($con, $sql_update);
        if ($result_update != null) {
            $sql = "DELETE FROM participants WHERE participant_ic=$ic";
            $result = mysqli_query($con, $sql);
            // $row = mysqli_fetch_array($result);
            if (isset($result)) {
                header("location: dashboard.php");
            } else {
                echo "ERROR: Fail to perform operation";
            }
        } else {
            echo "ERROR: Fail to update database";
        }
    } else {
        $sql = "DELETE FROM participants WHERE ic=$ic";
        $result = mysqli_query($con, $sql);
        // $row = mysqli_fetch_array($result);
        if (isset($result)) {
            header("location: dashboard.php");
        } else {
            echo "ERROR: Fail to perform operation";
        }
    
    }
} else {
    include("../component/Authorization.php");
}
?>