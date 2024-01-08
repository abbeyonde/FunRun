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
    include("connect.php");
    session_start();

    include("component/navbarParticipant.php");

    if (isset($_SESSION['id']) && isset($_SESSION['index'])) {
        if ($_SESSION['index'] == $_GET['id']) {
            $id = $_GET['id'];
            $name = $_POST['inputname'];
            $ic = $_POST['inputic'];
            $phone = $_POST['inputphone'];
            $password = $_POST['inputpw'];
            $age = $_POST['inputage'];
            $email = $_POST['inputemail'];
            $address = $_POST['inputaddress'];

            $sql = "UPDATE participants SET full_name=\"$name\",ic='$ic',password='$password',age='$age',email='$email',address='$address',phone='$phone' WHERE id=$id";
            $result = mysqli_query($con, $sql);
            if ($result != null) {
                echo "
            <script>
                window.location.href = 'profile.php?ic=$ic'
            </script>
            ";
            } else {
                echo "<h6><strong>Error:</strong> Fail to update data into database</h6>";

            }
        } else {
            echo "<h6>You don't have permission to perform this act</h6>";
        }

    } else {
    include("component/sessionTerminate.php");
    }

    include("component/footer.php");
    ?>
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