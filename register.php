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
    </style>

</head>

<body>
    <!-- Header -->
    <?php
    include('connect.php');

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
                        echo "<a class=\"nav-link\" href=\"profile.php?ic=" . $user . "\"><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
                        echo "<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 register\" href='signout.php'>Sign Out</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->


    <!-- Edit here-->
    <!--<div class="bg-danger p-2 text-dark bg-opacity-25">-->

    <form novalidate class="needs-validation" method="post" action="add-participant.php">
        <div class="profile col-lg-8 py-5 d-flex flex-column align-items-center mx-auto">
            <h1 class="h1 mb-3 fw-normal text-xl-center">Register Here</h1>
            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingname" name="inputname"
                        placeholder="Name" required>
                    <label for="floatingname light-300"> Full Name</label>
                    <div class="invalid-feedback">
                        Please enter full name.
                    </div>
                </div>
            </div><!-- End Input Name -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingic" name="inputic"
                        placeholder="Identification Number" required>
                    <label for="floatingic light-300">Identification Number</label>
                    <div class="invalid-feedback">
                        Please enter valid identification number.
                    </div>
                </div>
            </div><!-- End Input IC -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="tel" class="form-control form-control-lg light-300" id="floatingphone"
                        name="inputphone" placeholder="Phone" required>
                    <label for="floatingphone light-300">Phone</label>
                    <div class="invalid-feedback">
                        Please enter phone number.
                    </div>
                </div>
            </div><!-- End Input Phone -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input name="newPassword" type="password" autocomplete="off" class="form-control form-control-sm"
                        id="newPassword" placeholder="Create Password" aria-describedby="inputGroupPrepend" required>
                    <label for="floatingpassword light-300">Create Password</label>
                    <div class="invalid-feedback">
                        Please enter new password.
                    </div>
                </div>
            </div><!-- End Create Password -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input name="confirmPassword" type="password" autocomplete="off"
                        class="form-control form-control-sm" id="confirmPassword" placeholder="Confirm Password"
                        aria-describedby="inputGroupPrepend" required>
                    <label for="floatingconfirmpassword">Retype Password</label>
                    <div class="invalid-feedback">
                        Password is not a match.
                    </div>
                </div>
            </div><!-- End Retype Password -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input name="age" type="number" id="typeNumber" class="form-control" placeholder="Age" required>
                    <label for="typeNumber">Age</label>
                </div>
            </div><!-- End Select Age -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="email" class="form-control form-control-lg light-300" id="floatingemail"
                        name="inputemail" placeholder="Email" required>
                    <label for="floatingemail light-300">Email</label>
                    <div class="invalid-feedback">
                        Please enter valid email address.
                    </div>
                </div>
            </div><!-- End Input Email -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingaddress"
                        name="inputaddress" placeholder="Address" required>
                    <label for="floatingaddress light-300">Address</label>
                </div>
            </div><!-- End Input Address -->

            <div class="col-md-12 col-lg-6 m-auto text-start">
                <button type="submit"
                    class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Register
                    Now</button>
            </div>
        </div>
    </form>

    <!-- stop editing section -->

    <!-- Start Footer -->
    <!-- <footer class="bg-secondary pt-4">
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

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4 col-fit">
                    <h3 class="h4 pb-lg-3 text-light light-300">Our Website</h2>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light" href="">Home</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light py-1" href="landing.html/#about">About Us</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light py-1" href="">Category</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                    class="text-decoration-none text-light py-1" href="">Contact Us</a>
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

    </footer> -->
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

        // Check if passwords match
        const newPassword = document.getElementById("newPassword");
        const confirmPassword = document.getElementById("confirmPassword");

        const validatePassword = () => {
            if (
                newPassword.value == ! "" &&
                confirmPassword.value == ! "" &&
                newPassword.value == !confirmPassword.value
            ) {
                confirmPassword.setCustomValidity("Passwords do not match.");

            } else {
                confirmPassword.setCustomValidity("");
            }
        };

        newPassword.addEventListener("input", validatePassword);
        confirmPassword.addEventListener("input", validatePassword);

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            "use strict";
            window.addEventListener(
                "load",
                function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName("needs-validation");
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener(
                            "submit",
                            function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add("was-validated");
                            },
                            false
                        );
                    });
                },
                false
            );
        })();

    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>