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
    <link rel="stylesheet" href="assets/css/sign-in.css">


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

        .form-signin {
            min-height: 90vh;
        }

        .form-placement {
            margin-top: 30%;
        }

        #error {
            color: tomato;
        }
    </style>

</head>

<body>
    <?php
    include('connect.php');

    session_start();
    
    include("component/navbarParticipant.php");
    ?>
    <!-- Header -->
    <!-- Close Header -->

    <!-- Edit here-->
    <main class="form-signin w-100 m-auto">
        <form action="signin.php" method="post" class="form-placement needs-validation">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input name="ic" type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                    required>
                <label for="floatingInput">Identification Number</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>
            <div id="error" class=""></div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
        </form>
    </main>
    <!-- <script>
        document.getElementById("floatingPassword").addEventListener("change", ()=>{
            document.getElementById("floatingPassword").classList.remove("is-invalid");
        })
    </script> -->
    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/validate.js"></script>
    <?php

    if (isset($_POST['ic']) && isset($_POST['password'])) {
        $ic = $_POST["ic"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM participants WHERE ic='$ic'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result);

        if (isset($ic)) {
            if ($ic == $user["ic"]) {
                if ($password == $user["password"]) {
                    $_SESSION["id"] = $user["ic"];
                    $_SESSION["index"] = $user["id"];
                    echo '<script>
                        window.location.href ="index.php";
                        </script>';

                } else {
                    echo "
            <script>
                console.log(\"error\");
                document.getElementById(\"floatingInput\").value = \"$ic\";
                document.getElementById(\"error\").innerHTML = \"You have entered the wrong password.\";
                document.getElementById(\"floatingPassword\").classList.add(\"is-invalid\");
                document.getElementById(\"floatingPassword\").addEventListener(\"change\", (e)=>{
                    document.getElementById(\"error\").innerHTML = \"\";
                    document.getElementById(\"floatingPassword\").classList.remove(\"is-invalid\");
                })               
            </script>          
            ";
                }
            } else {
                $sql_admin = "SELECT * FROM administrators WHERE username='$ic'";
                $result_admin = mysqli_query($con, $sql_admin);
                $admin = mysqli_fetch_array($result_admin);
                if(isset($admin)){
                    if($password == $admin['password']){
                        $_SESSION['id'] = $admin['id'];
                        $_SESSION['role'] = "ADMIN";
                        echo '<script>
                        window.location.href ="admin/dashboard.php";
                        </script>';
                    }
                    else{
                        echo "
                        <script>
                            console.log(\"error\");
                            document.getElementById(\"floatingInput\").value = \"$ic\";
                            document.getElementById(\"error\").innerHTML = \"You have entered the wrong password.\";
                            document.getElementById(\"floatingPassword\").classList.add(\"is-invalid\");
                            document.getElementById(\"floatingPassword\").addEventListener(\"change\", (e)=>{
                                document.getElementById(\"error\").innerHTML = \"\";
                                document.getElementById(\"floatingPassword\").classList.remove(\"is-invalid\");
                            })               
                        </script>          
                        ";

                    }
                } else{
                    echo "
                    <script>
                    console.log(\"error\");
                    document.getElementById(\"error\").innerHTML = \"You're not registered yet. Register here\";
                    </script>
                    ";
                }
            }
        } else {
            echo "";
        }
    }
    ?>
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
</body>

</html>