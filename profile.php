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

        .btn-gray {
            background-color: gray;
            border-color: gray;
        }
    </style>
</head>

<body>
    <?php
    include('connect.php');
    session_start();
    include('participantsession.php');

    if (isset($_SESSION['id'])) {
        $user = $_SESSION['id'];
        $sql = "SELECT * FROM participants WHERE ic=$user";
        $result = mysqli_query($con, $sql);
        $profile = mysqli_fetch_array($result);
    }

    include("component/navbarParticipant.php");

    ?>
    <!-- Header -->
    <!-- Close Header -->
    <!-- Edit here-->
    <!-- Start Profile Page -->
    <?php
    if (isset($_SESSION["id"])) {
        if (isset($participant)) {
            ?>
            <section class="container py-5">
                <h1 class="col-12 col-xl-6 h2 text-primary pt-3 mx-auto">User Profile</h1>
                <!-- Start Profile Form -->
                <div class="col-12">
                    <form novalidate class="contact-form d-flex flex-column align-items-center mx-auto needs-validation"
                        method="post" action="update-profile.php?id=<?php echo $_SESSION['index']; ?>" role="form">

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>Name</h6><input type="text" class="profile form-control form-control-lg light-300"
                                    id="floatingname" name="inputname" value="<?php echo $profile['full_name']; ?>" disabled>
                                <div class="invalid-feedback">
                                    Please enter full name.
                                </div>
                            </div>
                        </div><!-- End Name -->

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>IC Number</h6><input type="text" class="profile form-control form-control-lg light-300"
                                    id="floatingicnum" name="inputic" value="<?php echo $profile['ic']; ?>" disabled>
                                <div class="invalid-feedback">
                                    Please enter valid identification number.
                                </div>
                            </div>
                        </div><!-- End IC Number -->

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>Email</h6><input type="text" class="profile form-control form-control-lg light-300"
                                    id="floatingemail" name="inputemail" value="<?php echo $profile['email']; ?>" disabled>
                                <div class="invalid-feedback">
                                    Please enter valid email address.
                                </div>
                            </div>
                        </div><!-- End Email -->

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>Phone Number</h6><input type="text" class="profile form-control form-control-lg light-300"
                                    id="floatingphone" name="inputphone" value="<?php echo $profile['phone']; ?>" disabled>

                            </div>
                        </div><!-- End Phone -->

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>Address</h6><input type="text" class="profile form-control form-control-lg light-300"
                                    id="floatingaddress" name="inputaddress" value="<?php echo $profile['address']; ?>"
                                    disabled>
                            </div>
                        </div><!-- End Address -->

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>Password</h6><input type="password" class="profile form-control form-control-lg light-300"
                                    id="floatingpw" name="inputpw" value="<?php echo $profile['password']; ?>" disabled>
                                <div class="invalid-feedback">
                                    Please enter new password.
                                </div>
                            </div>
                        </div><!-- End Password -->

                        <div class="col-11 col-lg-6 mb-4">
                            <div class=" form-floating">
                                <h6>Age</h6><input type="text" class="profile form-control form-control-lg light-300"
                                    id="floatingage" name="inputage" value="<?php echo $profile['age']; ?>" disabled>
                            </div>
                        </div><!-- End Age -->
                        <div class="col-12 col-md-12 col-lg-6 m-auto text-start">
                            <input id="update"
                                class="invisible col-12 btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300"
                                type="submit" value="Update">
                        </div>

                    </form>
                    <div class="col-12 col-md-12 col-lg-6 m-auto text-start">
                        <button id="edit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300"
                            onclick=onClickEdit()>Edit Profile</button>
                    </div>
                    <script>
                        const onClickEdit = () => {
                            inputs = document.getElementsByClassName('profile');
                            for (var i = 0; i < inputs.length; i++) {
                                inputs[i].disabled = false;
                                inputs[i].required = true;
                            }
                            document.getElementById('edit').classList.add('invisible');
                            document.getElementById('update').classList.remove('invisible');
                            document.getElementById('update').classList.add('visible');

                        }
                    </script>
                </div>
                <!-- End Profile Form -->
                <?php
                $sql_category = "SELECT registered_participants.category_id,registered_participants.id,registered_participants.paid,categories.category_name 
                                FROM registered_participants 
                                INNER JOIN categories 
                                ON registered_participants.category_id=categories.id 
                                WHERE participant_ic='$participant'";
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
                                    <td class="col-6 p-2">
                                        <?php echo $category['category_name']; ?>
                                    </td>
                                    <td class="col-4 text-center p-2">
                                        <?php
                                        echo " 
                                    <script>
                                        const paid = $category[paid];
                                        if(paid == 0){
                                            document.writeln('<a href=\"/FunRun/payment.php?ic='+'$participant' + '&category=' + '$category[category_id]' +'&from=profile \" class=\"btn rounded-pill px-4 btn-outline-primary\">Make Payment</a>');
    
                                        }
                                        else{
                                            document.writeln(\"<span class='col-8 btn btn-success rounded-pill text-light'>Paid</span>\");
                                        }
                                    </script>";
                                        ?>
                                    </td>
                                    <td class="col-2 text-center p-2"><a class="btn btn-primary rounded-pill"
                                            href="<?php echo '/FunRun/delete-category.php?ic=' . $participant . '&id=' . $category['id'] . '&category=' . $category['category_id']; ?>">Unregister</a>
                                    </td>
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
    } else {
        ?>
        <section class="container py-5">
            <h1 class="col-12 col-xl-6 h2 text-primary pt-3 mx-auto">Session Terminated</h1>
            <p>Your session has been expired.</p>
        </section>
        <?php
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