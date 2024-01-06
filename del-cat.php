<?php
include("connect.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
    $id = $_GET["id"];
    $sql = "DELETE FROM categories WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result != null) {
        header("location: view-all-category.php");
    } else {
        echo "<h6><strong>ERROR:</strong> Fail to perform the request</h6>";
        echo "<a href='dashboard.php'>Home</a>";
    }

} else {
    include("SessionTerminate.php");
}

?>