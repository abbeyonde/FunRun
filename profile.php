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

    <script>
        const user = window.sessionStorage.getItem('user');
        if (user == null) {
            window.location.href = "signin.php";
        }
        else {
        }
    </script>


</head>

<body>
    <?php
    include('connect.php');
    include('participantsession.php');
    $sql = "SELECT * FROM participants WHERE ic='$user'";
    $result = mysqli_query($con, $sql);
    $profile = mysqli_fetch_array($result);
    ?>

    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="index.html">
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.html">Home</a>
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
                    <script>
                        if (user == null) {
                            document.writeln("<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 signin\" href=\"signin.php\">Sign In</a>")
                            document.writeln("<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 register \" href=\"\">Register</a>")
                        }
                    </script>
                </div>
                <div class="navbar align-self-center d-flex">
                    <script>
                        const onSignOut = () => {
                            window.sessionStorage.removeItem("user");
                            window.location.href = "index.html";
                        }
                        if (user) {
                            document.writeln("<a class=\"nav-link\" href=\"profile.php?ic=" + user + "\"><i class='bx bx-user-circle bx-sm text-primary'></i></a>");
                            document.writeln("<label class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 register\" onclick=onSignOut()>Sign Out</label>")

                        }
                    </script>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->
    <!-- Edit here-->
    <!-- Start Profile Page -->
    <?php
    if (isset($user)) {
        ?>
        <section class="container py-5">
            <h1 class="col-12 col-xl-8 h2 text-center text-primary pt-3 mx-0">User Profile</h1>
            <br>
            <!-- Start Profile Form -->
            <div class="col-lg-12">
                <form class="contact-form d-flex flex-column align-items-center mx-auto" method="post" action="#"
                    role="form">

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>Name</h6><input type="text" class="form-control form-control-lg light-300" id="floatingname"
                                name="inputname" value="<?php echo $profile['full_name']; ?>" disabled>
                        </div>
                    </div><!-- End Name -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>IC Number</h6><input type="text" class="form-control form-control-lg light-300"
                                id="floatingicnum" name="inputicnum" value="<?php echo $profile['ic']; ?>" disabled>
                        </div>
                    </div><!-- End IC Number -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>Email</h6><input type="text" class="form-control form-control-lg light-300"
                                id="floatingemail" name="inputemail" value="<?php echo $profile['email']; ?>" disabled>
                        </div>
                    </div><!-- End Email -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>Phone Number</h6><input type="text" class="form-control form-control-lg light-300"
                                id="floatingphone" name="inputphone" value="<?php echo $profile['phone']; ?>" disabled>
                        </div>
                    </div><!-- End Phone -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>Address</h6><input type="text" class="form-control form-control-lg light-300"
                                id="floatingaddress" name="inputaddress" value="<?php echo $profile['address']; ?>"
                                disabled>
                        </div>
                    </div><!-- End Address -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>Password</h6><input type="password" class="form-control form-control-lg light-300"
                                id="floatingpw" name="inputpw" value="<?php echo $profile['password']; ?>" disabled>
                        </div>
                    </div><!-- End Password -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <h6>Age</h6><input type="text" class="form-control form-control-lg light-300" id="floatingage"
                                name="inputage" value="<?php echo $profile['age']; ?>" disabled>
                        </div>
                    </div><!-- End Age -->

                    <div class="col-md-12 col-lg-6 m-auto text-start">
                        <button class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Edit
                            Profile</button>
                    </div>
                </form>
            </div>
            <!-- End Profile Form -->
            <?php
            $sql_category = "   SELECT registered_participants.paid,categories.category_name 
                                FROM registered_participants 
                                INNER JOIN categories 
                                ON registered_participants.category_id=categories.id 
                                WHERE participant_ic='$user'";
            // $sql_category = "SELECT * FROM categories";
            $result_category = mysqli_query($con, $sql_category);
            $category = mysqli_fetch_array($result_category);
            if (isset($category)) {
                ?>
                <div id="category" class="col-lg-6 my-5 mx-auto">
                    <h4 class="light-300 mb-2"><strong>Registered Category</strong></h4>
                    <div class="category">
                        <table id="category-table" class="col-12 light-300">
                            <tr>
                                <td class="col-6 p-2 text-center">
                                    <?php echo $category['category_name']; ?>
                                </td>
                                <td class="col-4 text-center">
                                    <?php
                                    echo " 
                                    <script>
                                        const paid = $category[paid];
                                        if(paid == 0){
                                            document.writeln(\"Unpaid: <a class='' href=''>Make Payment</a>\");
                                        }
                                        else{
                                            document.writeln('Paid');
                                        }
                                    </script>";
                                    ?>
                                </td>
                                <td class="col-2 text-center"><a href="">Unregister</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php } ?>
            </div>

        </section>
        <!-- End Profile Page -->

        <!-- stop editing section -->

        <?php
    } else {
        ?>
        <section class="container py-5 ">
            <h1>Fail to retrieve participant profile</h1>
            <p>Please contact system admin to solve this issue.</p>
        </section>

        <?php
    }
    ?>

    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4 d-flex justify-content-lg-around">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="index.html">
                        <i class='bx bx-buildings bx-sm text-light'></i>
                        <span class="text-light h5">Fun</span><span class="text-light h5 semi-bold-600">Run</span>
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

                <!-- <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">Our Works</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                class="text-decoration-none text-light py-1" href="#">Branding</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                class="text-decoration-none text-light py-1" href="#">Business</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                class="text-decoration-none text-light py-1" href="#">Marketing</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                class="text-decoration-none text-light py-1" href="#">Social Media</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                class="text-decoration-none text-light py-1" href="#">Digital Solution</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a
                                class="text-decoration-none text-light py-1" href="#">Graphic</a>
                        </li>
                    </ul>
                </div> -->

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

</body>

</html>