<!DOCTYPE html>
<html lang="en">

<head>
    <title>UNI10Marathon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">


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
    $id = $_GET['id'];
    if(isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN'){
    $sql = "SELECT participants.*, categories.id category_id,categories.category_name, rp.id rp_id,rp.paid 
    FROM participants 
    LEFT JOIN registered_participants rp 
    ON participants.ic=rp.participant_ic 
    LEFT JOIN categories 
    ON rp.category_id=categories.id
    WHERE participants.id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    include("../component/navbarAdmin.php");
    ?>
    <!-- Header -->
    <!-- Close Header -->

    <!-- Edit here-->
    <div class="container py-5 min-vh-100">
        <div class="container-fluid mx-auto">
            <div class="row justify-content-center">
                <main class="col-md-9 col-lg-10 px-md-4">
                    <h2 class="my-3">Participant ID: #
                        <?php echo $row['id']; ?>
                    </h2>
                    <!-- <form class="d-flex col-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search ID" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                    <div class="col-12 col-lg-9">
                        <table class="table table-responsive table-striped ">
                            <tr>
                                <th class="col-4">Full Name</th>
                                <td class="col-8">
                                    <?php echo $row['full_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Identity Number</th>
                                <td>
                                    <?php echo $row['ic']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>
                                    <?php echo $row['age']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <?php echo $row['address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>
                                    <?php echo $row['phone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Registered Category</th>
                                <td>
                                    <table class="col-12">
                                        <tr>
                                            <td class="col-6">
                                                <?php echo $row['category_name']; ?>
                                            </td>
                                            <td class="col-2 text-center text-muted">
                                                <?php
                                                if ($row['category_name'] != null) {
                                                    if ($row['paid'] == 1) {
                                                        echo "Paid";
                                                    } else {
                                                        echo "Unpaid";
                                                    }
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            if ($row['category_name'] != null) {
                                                echo '<td class="col-4 text-center">
                                                <a href="delete-entry.php?participant='.$row['id'].'&category='.$row['category_id'].'&record='.$row['rp_id'].'" class="btn btn-outline-primary rounded-pill text-red">Delete
                                                    Entry</a>
                                            </td>';
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

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
        include("../component/Authorization.php");   
    }
    ?>
    <!-- stop editing section -->
    <!-- Start Footer -->
    <!-- End Footer -->
    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="../assets/js/isotope.pkgd.js"></script>
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
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>


</body>

</html>