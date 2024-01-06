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
    include("connect.php");
    session_start();

    if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
        ?>
        <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand h1" href="index.php">
                    <i class='bx bx-buildings bx-sm text-dark'></i>
                    <span class="text-dark h4">U10M - </span><span class="text-primary h4">Admin Dashboard</span>
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
                                <a class="nav-link btn-outline-primary rounded-pill px-3" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3"
                                    href="dashboard.php">Participants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3"
                                    href="view-all-category.php">Categories</a>
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
        <form class="needs-validation" action="process-category.php" method="post">
            <div class="category col-lg-8 py-5 d-flex flex-column align-items-center mx-auto">
                <h1 class="h3 mb-3 fw-normal text-xl-center">Add New Category</h1>

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg light-300" id="categoryname"
                            name="categoryname" placeholder="Category Name" required>
                        <label for="floatingname light-300">Category Name</label>

                        <div class="invalid-feedback">
                            Please enter category name.
                        </div>
                    </div>
                </div><!-- End Category Name -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input type="float" class="form-control form-control-lg light-300" id="floatingdistance"
                            name="inputdistance" placeholder="Distance (KM)" required>
                        <label for="floatingdistance light-300">Distance (KM)</label>

                        <div class="invalid-feedback">
                            Please enter distance.
                        </div>
                    </div>
                </div><!-- End Distance -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <select class="form-control form-control-lg light-300" id="floatingcategorytype" style="height:85px"
                        name="inputcategorytype" placeholder="Category Type" required>
                        
                        <option id="funrun" value="Fun Run">Fun Run</option>
                        <option id="competitive" value="Competitive">Competitive</option>
                    </select>
                    <label for="floatingcategorytype light-300">Category Type</label>
                    </div>
                </div><!-- End Category Type -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input name="flagofftime" type="text" autocomplete="off" class="form-control form-control-lg light-300"
                            id="flagofftime" placeholder="Flag-Off Time" required>
                        <span class="glyphicon glyphicon-time"></span>
                        <label for="floatingflagofftime light-300">Flag-Off Time</label>

                        <div class="invalid-feedback">
                            Please enter Flag-Off Time.
                        </div>
                    </div>
                </div><!-- End Flag-Off Time -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input name="cutofftime" type="text" autocomplete="off" class="form-control form-control-lg light-300"
                            id="cutofftime" placeholder="Cut-Off Time" required>
                        <span class="glyphicon glyphicon-time"></span>
                        <label for="floatingcutofftime light-300">Cut-Off Time</label>

                        <div class="invalid-feedback">
                            Please enter Cut-Off Time.
                        </div>
                    </div>
                </div><!-- End Cut-Off Time -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <textarea class="form-control form-control-lg light-300" id="floatingdescription"
                            style="height:100px" name="inputdescription" placeholder="description" required></textarea>
                        <label for="floatingdescription light-300">Description</label>

                        <div class="invalid-feedback">
                            Please enter description.
                        </div>
                    </div>
                </div><!-- End Description -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input name="minage" type="number" id="typeminimumage" class="form-control form-control-lg light-300" placeholder="Minimum Age" required>
                        <label for="typeminimumage">Minimum Age</label>

                        <div class="invalid-feedback">
                            Please select age.
                        </div>
                    </div>
                </div><!-- End Minimum Age -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input type="number" class="form-control form-control-lg light-300" id="floatingprice"
                            name="inputprice" placeholder="Price (RM)" required>
                        <label for="floatingprice light-300">Price (RM)</label>

                        <div class="invalid-feedback">
                            Please enter price.
                        </div>
                    </div>
                </div><!-- End Price -->

                <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                        <input type="number" class="form-control form-control-lg light-300" id="floatingprice"
                            name="inputquota" placeholder="Quota" required>
                        <label for="floatingprice light-300">Quota</label>

                        <div class="invalid-feedback">
                            Please enter participation limits.
                        </div>
                    </div>
                </div><!-- End Price -->

                <div class="col-md-12 col-lg-6 m-auto text-start">
                    <button type="submit"
                        class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Add Category
                        Now</button>
                </div>
            </div>
        </form>
        <?php
    } else {
        echo '<div class="container">';
        echo '<h1 class="mx-auto mt-5 mb-2 text-center">Authorization Fail</h1>';
        echo '<p class="mx-auto text-center">You are not allowed to access this page.</p>';
        echo '<p class="col-12 mx-auto text-center"><a href="index.php">Home</a></p>';
        echo '</div>';

    }
    ?>


    <!-- stop editing section -->
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

        // Choose Flag Off Time
        $('#flagofftime').flagofftime({
            format: 'LT'
        });

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            "use strict";
            window.addEventListener(
                "load",
                function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms1 = document.getElementsByClassName("needs-validation");

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms1, function (form) {
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