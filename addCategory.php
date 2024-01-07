<!DOCTYPE html>
<html lang="en">

<head>
    <title>UNI10Marathon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <style>
        .navbar .register {
            background-color: #db3a34;
            color: white;
        }

        .navbar .register:hover {
            background-color: #992825;
        }

        .navbar .signin:hover {
            text-decoration: underline;
            color: #db3a34;
            background-color: transparent;
        }

        .navbar .signin:focus {
            -webkit-box-shadow: 0 0 0 0.25rem rgba(67, 50, 194, 0);
            box-shadow: 0 0 0 0.25rem rgba(67, 50, 194, 0);
        }

        .col-fit {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: fit-content;
        }

        .color-white {
            color: whitesmoke;
        }

        .text-lg-justify {
            text-align: justify;
        }
    </style>
    <script>
        const user = window.sessionStorage.getItem("user");
    </script>
</head>

<body>
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
    include("component/navbarParticipant.php");
    include("component/sessionTerminate.php");
}
?>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function () {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function () {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });


    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/timer.js"></script>

</body>

</html>