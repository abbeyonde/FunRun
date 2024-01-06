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
            header("location: view-participant.php?id='$participant_id'");
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
        </head>

        <body>
            <!-- Header -->
            <?php
            session_start();
            ?>
            <!-- Header -->
            <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand h1" href="index.php">
                        <i class='bx bx-buildings bx-sm text-dark'></i>
                        <span class="text-dark h4">UNI10</span><span class="text-primary h4">Marathon</span>
                    </a>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                        id="navbar-toggler-success">
                        <div class="flex-fill mx-xl-5 mb-2 ">
                            <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                                <li class="nav-item">
                                    <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.php#about">About
                                        Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn-outline-primary rounded-pill px-3" href="category.php">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn-outline-primary rounded-pill px-3" href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar align-self-center d-flex">
                            <?php

                            if (!isset($_SESSION['id'])) {

                                echo "<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 signin\" href=\"signin.php\">Sign In</a>";
                                echo "<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 register \" href=\"register.php\">Register</a>";
                            }
                            ?>
                        </div>
                        <div class="navbar align-self-center d-flex">
                            <?php
                            if (isset($_SESSION['id'])) {
                                $user = $_SESSION['id'];
                                echo "<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 register\" href='signout.php'>Sign Out</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Close Header -->

            <!-- Edit here-->
            <section class="container py-5 ">
                <h1>Fail to complete request</h1>
                <p>Please try it another time or contact system admin to solve this issue.</p>
            </section>
        <?php }
} else {
    echo '<div class="container">';
    echo '<h1 class="mx-auto mt-5 mb-2 text-center">Authorization Fail</h1>';
    echo '<p class="mx-auto text-center">You are not allowed to access this page.</p>';
    echo '<p class="col-12 mx-auto text-center"><a href="index.php">Home</a></p>';
    echo '</div>';
} ?>
    <!-- stop editing section -->

    <!-- Start Footer -->
    <!-- End Footer -->
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