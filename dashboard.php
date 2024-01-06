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
            background-color: #6266ea;
            color: white;
        }

        .navbar .register:hover {
            background-color: #40439e;
        }

        .navbar .signin:hover {
            text-decoration: underline;
            color: #6266ea;
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

        bg-red {
            background-color: red;
        }
    </style>

</head>

<body>
    <?php
    include("connect.php");

    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
    $sql = "SELECT participants.*, categories.category_name, rp.paid 
    FROM participants 
    LEFT JOIN registered_participants rp 
    ON participants.ic=rp.participant_ic 
    LEFT JOIN categories 
    ON rp.category_id=categories.id;";
    $result = mysqli_query($con, $sql);

    ?>
    <!-- Header -->
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="dashboard.php">Participants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="view-all-category.php">Categories</a>
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
    <div class="container py-5 min-vh-100">
        <div class="container-fluid mx-auto">
            <div class="row justify-content-center">
                <main class="col-md-9 col-lg-10 px-md-4">
                    <h2 class="my-3">Participants</h2>
                    <form action="search-participant.php" method="post" class="d-flex col-3" role="search">
                        <input name="filter" class="form-control me-2" type="search" placeholder="Search Name" required/>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="col-12">
                        <table class="table table-responsive table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">IC Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Registered Event</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row["category_name"] != null) {
                                        if ($row['paid'] == 1) {
                                            $status = "Paid";
                                        } else {
                                            $status = "Unpaid";
                                        }
                                    } else {
                                        $status = "";
                                    }
                                    echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['full_name'] . '</td>
                                <td>' . $row['ic'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['category_name'] . '</td>
                                <td>' . $status . '</td>
                                <td><a href="view-participant.php?id=' . $row['id'] . '" class="btn btn-primary" data-toggle="modal" data-target="#editModal1">View</a></td>
                                <td><a href="delete-participant.php?id=' . $row['id'] .'&ic='.$row['ic'].'" class="btn btn-danger" style="color: white" >Delete</a></td>
                            </tr>
                            ';

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>

        <!-- Edit Participant Modals -->
        <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel1"
            aria-hidden="true">
            <!-- Edit participant form goes here -->
        </div>

        <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="editModalLabel2"
            aria-hidden="true">
            <!-- Edit participant form goes here -->
        </div>

        <div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-labelledby="editModalLabel3"
            aria-hidden="true">
            <!-- Edit participant form goes here -->
        </div>

        <div class="modal fade" id="editModal4" tabindex="-1" role="dialog" aria-labelledby="editModalLabel4"
            aria-hidden="true">
            <!-- Edit participant form goes here -->
        </div>

    </div>
    <?php
    } 
    else{
        echo '<div class="container">';
        echo '<h1 class="mx-auto mt-5 mb-2 text-center">Authorization Fail</h1>';
        echo '<p class="mx-auto text-center">You are not allowed to access this page.</p>';
        echo '<p class="col-12 mx-auto text-center"><a href="index.php">Home</a></p>';
        echo '</div>';
    
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