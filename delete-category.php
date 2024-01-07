<?php
include("connect.php");
include("participantsession.php");
session_start();

$id = $_GET['id'];
$category_id = $_GET['category'];

$sql = "DELETE FROM registered_participants WHERE id=$id";
$result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result);
if (isset($_SESSION['id'])) {
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
            header("location: profile.php?ic='$user'");
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

            include("component/navbarParticipant.php")
            ?>
            <!-- Header -->
            <!-- Close Header -->

            <!-- Edit here-->
            <section class="container py-5 ">
                <h1>Fail to complete request</h1>
                <p>Please try it another time or contact system admin to solve this issue.</p>
            </section>

        <?php
    }
} else {
    include("component/sessionTerminate.php");
}
?>
    <!-- stop editing section -->

    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4 d-flex justify-content-lg-around">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="index.html">
                        <i class='bx bx-buildings bx-sm text-light'></i>
                        <span class="text-light h5">UNI10</span><span class="text-light h5 semi-bold-600">
                            Marathon</span>
                    </a>
                    <p class="text-light my-lg-4 my-2">
                        Get ready for a day of pure joy at our Fun Run! Picture smiling faces, vibrant costumes, and
                        positive vibes.
                        Bring your A-game, lace up, and join us for a day of laughter and unforgettable memories. See
                        you there!
                    </p>
                    <ul class="list-inline footer-icons light-300">
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="http://facebook.com/">
                                <i class='bx bxl-facebook-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.linkedin.com/">
                                <i class='bx bxl-linkedin-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.whatsapp.com/">
                                <i class='bx bxl-whatsapp-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.flickr.com/">
                                <i class='bx bxl-flickr-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.medium.com/">
                                <i class='bx bxl-medium-square bx-md'></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h3 class="h4 pb-lg-3 text-light light-300">Our Website</h2>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light" href="#">Home</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light py-1" href="#about">About Us</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light py-1" href="category.html">Category</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light py-1" href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-primary py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-start text-center text-light light-300">
                            © Copyright 2024 Web Programming 02A. Group 2.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
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