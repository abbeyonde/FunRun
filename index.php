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

<?php
    $con = mysqli_connect("localhost", "root", "", "uni10_maraton");

    $ic = $_POST["ic"];
    $password = $_POST["password"];



    $sql = "SELECT * FROM participants WHERE ic='$ic' AND password='$password'";

    $result = mysqli_query($con, $sql);

    $user = mysqli_fetch_array($result);

    
    if($ic == isset($user["ic"])){
        echo "
        <script>
        console.log(\"test\");
        const user = \"$user[ic]\";
        window.sessionStorage.setItem(\"user\", user)
        </script>
        ";
        }
        else{
            echo "
            <script>
                console.log(\"error\");
                //document.getElementById(\"error\").value = \"wrong username\";
            </script>";
    
        }
    ?>

</head>

<body>
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="category.html">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <!-- <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a> -->
                    <a class="nav-link btn-outline-primary rounded-pill px-3 mx-3 signin" href="signin.html">Sign In</a>
                    <a class="nav-link btn-outline-primary rounded-pill px-3 mx-3 register " href="">Register</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Edit here-->
    <!-- Start Banner Hero -->
    <!-- Home section -->
    <div class="banner-wrapper bg-light">
        <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5">

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- <img class="object-fit-cover w-100 h-100" src="./assets/img/bg-marathon.jpg"> -->
                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1
                                    class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    <strong>Conquer the Distance,<br>Embrace the Journey!</strong>
                                    <br>UNI10 Marathon 2024
                                </h1>
                                <p class="banner-body text-muted py-3 mx-0 px-0">
                                    Embark on a 42.195-kilometer journey, where each step is a testament to your
                                    endurance.
                                    Join the marathon, and let your strides carve a story of triumph and resilience.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#"
                                    role="button">Register Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    <strong>Half the Distance,<br>Twice the Fun!</strong>
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Take on the challenge of 13.1 miles, where every stride is a dance between
                                    determination and exhilaration.
                                    Join the chorus of runners, and let the rhythm of your steps create a masterpiece of
                                    achievement.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#"
                                    role="button">Register Now</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    <strong>Run 7KM,<br>Unleash the power within!</strong>
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Venture into a 7KM odyssey, a course designed for explorers of their own potential.
                                    Lace up, breathe in the adventure, and conquer 7KM with a heart full of courage and
                                    a soul hungry for discovery.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#"
                                    role="button">Register Now</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    <strong>5KM – Your Personal Victory Lap!</strong>
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Your 5KM journey is more than a run; it's a personalized victory lap where every
                                    stride echoes your triumphs.
                                    Join the 5KM community – where every finish line is a new beginning.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#"
                                    role="button">Register Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    <strong>3KM: Young Hearts and Wise Souls Unite!</strong>
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    The 3KM run is a bridge between generations, a path where young hearts and wise
                                    souls meet.
                                    Step into the 3KM realm, where every footfall is a promise to cherish the vitality
                                    of youth and the wisdom of age
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#"
                                    role="button">Register Now</a>
                            </div>
                        </div>


                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button"
                    data-bs-slide="prev">
                    <i class='bx bx-chevron-left'></i>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button"
                    data-bs-slide="next">
                    <i class='bx bx-chevron-right'></i>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <!-- End slider -->

        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- countdown -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row event-date">
                <h2 id="cd-headline" class="h2 text-center col-12 pt-5 semi-bold-600">Countdown</h2>
                <h1 id="event-date" class="text-center">14 / 2 / 2024</h1>
                <div id="countdown" class="d-flex justify-content-lg-around text-center col-12">
                    <ul class="mx-0 col-12 px-0">
                        <li><span id="days"></span>days</li>
                        <li><span id="hours"></span>Hours</li>
                        <li><span id="minutes"></span>Minutes</li>
                        <li><span id="seconds"></span>Seconds</li>
                    </ul>
                </div>
            </div>
    </section>

    <!-- About Us -->
    <section id="about" class="bg-light w-100 h-100">
        <div class="container">
            <div class="row d-flex align-items-center py-5">

                <div class="col-lg-6 text-start">
                    <h1 class="h2 py-5 text-primary typo-space-line">About Us</h1>
                    <p class="light-300 text-lg-justify">
                        Welcome to UNI10 Marathon 2024, where the love for running meets the thrill of challenge.
                        We are more than a marathon; we are a community united by the passion for pushing boundaries,
                        embracing victories, and celebrating the spirit of endurance.
                        Join us on this exhilarating journey – together, we run not just for the finish line, but for
                        the joy of the run itself
                    </p>
                </div>
                <div class="col-lg-6">
                    <img class="object-fit-cover w-100 h-100" src="./assets/img/Marathon.png">
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secondary py-3">
        <div class="container py-5">
            <h2 class="h2 text-white text-center py-5">Our Partner</h2>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 text-white bx bxs-buildings'></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 bx text-white bxs-check-shield bx-lg'></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 text-white bx bxs-bolt-circle'></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 text-white bx bxs-spa'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact us -->
    <!-- stop editing section -->

    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4 d-flex justify-content-lg-around">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="index.php">
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