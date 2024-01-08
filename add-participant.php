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
    <!-- Header -->
    <?php
    include('connect.php');

    session_start();

    include("component/navbarParticipant.php"); //import navbar
    ?>
    <!-- Header -->
    <!-- Close Header -->
    <?php
    $name = $_POST['inputname'];
    $ic = $_POST['inputic'];
    $phone = $_POST['inputphone'];
    $password = $_POST['confirmPassword'];
    $age = $_POST['age'];
    $email = $_POST['inputemail'];
    $address = $_POST['inputaddress'];

    $sql_check = "SELECT * FROM participants WHERE ic=$ic";
    $result_check = mysqli_query($con, $sql_check);
    $row_check = mysqli_fetch_array($result_check);
    if ($row_check == null) {

        $sql = "INSERT INTO participants VALUES ('','$name','$ic','$password','$age','$email','$address','$phone')";
        $result = mysqli_query($con, $sql);
        if ($result == null) { ?>
            <div class="col-9 mx-auto">
                <h1>Fail to register participant's profile</h1>
                <p>Please try again. Click <a href="index.php">here</a></p>
            </div>
            <!-- Start Footer -->
            <?php include("component/footer.php"); ?>
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
        <?php
        } else { ?>
        <script>
            window.location.href = "signin.php";
        </script>
        <?php
        }
    } else {
        // include("component/navbarParticipant.php");
        ?>
    <div class="col-12 mt-5 text-center">
        <h1>Existing account detected</h1>
        <p>Go back <a href="index.php">Home</a></p>
    </div>
    <?php
    }
    ?>