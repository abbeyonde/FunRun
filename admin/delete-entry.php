<?php
include("connect.php");

session_start();

$id = $_GET['record'];
$participant_id = $_GET['participant'];
$category_id = $_GET['category'];
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
    $sql = "DELETE FROM registered_participants WHERE id=$id";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_array($result);
    if ($result) {
        $sql_check = "SELECT current_participants FROM categories WHERE id=$category_id";
        $result_check = mysqli_query($con, $sql_check);
        $total_p = mysqli_fetch_array($result_check);
        // echo "$total_p[current_participants]";
        $new_p = $total_p["current_participants"] - 1;
        // echo "$new_p";
        $sql_update = "UPDATE categories SET current_participants=$new_p WHERE id=$category_id";
        $result_update = mysqli_query($con, $sql_update);
        if ($result_update) {
            if($_GET['from'] == 1){
                header("location: view-cat-participant.php?id='$category_id'");
            }
            else{
                header("location: view-participant.php?id='$participant_id'");
            }
        } else {
            echo "ERROR: Fail to update database";
        }
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>UNI10Marathon</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
            <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
            <!-- Load Require CSS -->
            <link href="../assets/css/bootstrap.css" rel="stylesheet">
            <!-- Font CSS -->
            <link href="../assets/css/boxicon.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
            <!-- Load Tempalte CSS -->
            <link rel="stylesheet" href="../assets/css/templatemo.css">
            <!-- Custom CSS -->
            <link rel="stylesheet" href="../assets/css/custom.css">

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
        </head>

        <body>
            <!-- Header -->
            <?php
            session_start();

            include("../component/navbarAdmin.php");
            ?>
            <!-- Header -->
            <!-- Close Header -->

            <!-- Edit here-->
            <section class="container py-5 ">
                <h1>Fail to complete request</h1>
                <p>Please try it another time or contact system admin to solve this issue.</p>
            </section>
        <?php }
} else {
    include("../component/Authorization.php");
} ?>
    <!-- stop editing section -->

    <!-- Start Footer -->
    <!-- End Footer -->
    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="../assets/js/isotope.pkgd.js"></script>
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
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/timer.js"></script>

</body>

</html>