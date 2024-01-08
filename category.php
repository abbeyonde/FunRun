<!DOCTYPE html>
<html lang="en">

<head>
    <title>UNI10Marathon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

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

        .popup .overlay {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
            display: none;
        }

        .popup .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)scale(0);
            background: #fff;
            width: 450px;
            height: 275px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .popup .btn-close {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
        }

        .popup.active .overlay {
            display: block;
        }

        .popup.active .content {
            transition: all 300ms ease-in-out;
            transform: translate(-50%, -50%)scale(1);
        }

        .btn-gray {
            background-color: gray;
            border-color: gray;
        }


        @media (max-width: 700px) {
            .popup .content {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php
    include('connect.php');

    session_start();

    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
    $colors = array('rgba(163, 5, 5, 0.678)', 'rgb(55, 55, 117)', 'rgb(226, 134, 59)', 'rgba(209, 206, 46,0.87)');
    // $row = mysqli_fetch_array($result);
    
    ?>
    <script>
        const user = '<?php echo $_SESSION['id']; ?>';
        const from = 'category';
        const addCategory = (category) => {
            document.writeln('<a href="/FunRun/payment.php?ic=' + user + '&category=' + category + '&from=' + from + '" class="btn rounded-pill px-4 btn-outline-primary mb-3">');

        }
    </script>
    <!-- Header -->
    <?php include("component/navbarParticipant.php"); ?>
    <!-- Close Header -->

    <!-- Edit here-->
    <div class="container py-5">

        <h1 class="h2 semi-bold-600 text-center mt-2">Event Categories</h1>
        <p class="text-center pb-5 light-300">Explore Your Race. From the heart-pounding thrill of the Full Marathon
            to the speedy excitement of the 5K Run and the multi-sport challenge of the Triathlon.
        </p>

        <div class="m-auto col-10">
            <h3 class="m-auto d-flex mb-4">Event Info:</h3>
            <div class="d-flex justify-content-between m-auto">

                <!--info on the left-->
                <div class="col-5 ">
                    <div>
                        <p class="col-10 d-flex me-4 my-2" style="float:left; width: 10px; height: 32px;">
                            <img src="assets/img/calendar-day-solid.svg">
                        </p>
                        <p class="col-10 d-flex semi-bold-600 mb-0"> Name:</p>
                        <p class="col-10 d-flex mb-4"> UNI10 Marathon 2024</p>
                    </div>

                    <div>

                        <p class="col-10 d-flex me-4 my-2" style="float:left; ; width: 10px; height: 32px;"> <img
                                src="assets/img/a-location-dot-solid.svg" alt=""></p>
                        <p class="col-10 d-flex semi-bold-600 mb-0"> Location:</p>
                        <p class="col-10 d-flex mb-4"> Dataran Merdeka, Kuala Lumpur</p>
                    </div>

                    <div>
                        <p class="col-10 d-flex me-4 my-2" style="float:left; ; width: 10px; height: 32px;"> <img
                                src="assets/img/user.svg" alt=""></p>
                        <p class="col-10 d-flex semi-bold-600 mb-0"> Event Organiser:</p>
                        <p class="col-10 d-flex mb-4"> Musab Salihin Sdn Bhd</p>
                    </div>
                </div>


                <!--info on the right-->
                <div class="col-5">
                    <div>
                        <p class="col-10 d-flex me-4 my-2" style="float:left; ; width: 10px; height: 32px;"> <img
                                src="assets/img/date.svg" alt=""></p>
                        <p class="col-10 d-flex semi-bold-600 mb-0"> Date:</p>
                        <p class="col-10 d-flex mb-4"> 12 February 2024</p>
                    </div>

                    <div>
                        <p class="col-10 d-flex me-4 my-2" style="float:left; ; width: 10px; height: 30px;"> <img
                                src="assets/img/start.svg" alt=""></p>
                        <p class="col-10 d-flex semi-bold-600 mb-0"> Flag Off Time:</p>
                        <p class="col-10 d-flex mb-4"> 42.2km: 0400am <br>
                            21.1km: 0430am <br>
                            5.0km: 0700am <br>
                            3.0km: 0715am </p>
                    </div>

                </div>

            </div>
        </div>
        <?php
        $index = 0;
        while ($row = mysqli_fetch_array($result)) {

            ?>
            <div id="<?php echo $row['tag'] ?>"
                class="pricing-horizontal row col-10 m-auto mt-5 d-flex shadow-sm rounded overflow-hidden bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center text-light py-4"
                    style="background-color: <?php echo $colors[$index] ?>;">
                    <!--style="background-image: url('/assets/img/finish.png'); background-size:60%; background-position: center;"-->
                    <!--image in menu-->
                    <!-- <img src="assets/img/finish.png" alt="Marathon Image" width="60%" class="mt-3"> -->
                    <h5 class="h5 semi-bold-600 pb-4 light-300">
                        <?php echo $row['category_name']; ?>
                    </h5>
                </div>
                <div
                    class="pricing-horizontal-body offset-lg-1 col-md-6 col-lg-5 d-flex align-items-center pl-4 pt-lg-0 pt-4">
                    <div class="w-100">
                        <p class="mb-3 light-300">
                            <?php echo $row['description'] ?>
                        </p>

                        <!-- Accordion for Details -->
                        <div class="accordion w-100 bg-white" id="accordion<?php echo $row['tag']; ?>">
                            <div class="accordion-item ">
                                <h2 class="accordion-header" id="heading<?php echo $row['tag']; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo $row['tag']; ?>" aria-expanded="true"
                                        aria-controls="collapse<?php echo $row['tag']; ?>">
                                        Details
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $row['tag'] ?>" class="accordion-collapse collapse "
                                    aria-labelledby="headingFullMarathon"
                                    data-bs-parent="#accordion<?php echo $row['tag']; ?>">
                                    <div class="accordion-body">
                                        <ul class="text-left px-4 list-unstyled mb-0 light-300">
                                            <li><i class="bx bxs-circle me-2"></i><strong>Distance:</strong>
                                                <?php echo $row['distance']; ?> kilometers
                                            </li>
                                            <li><i class="bx bxs-circle me-2"></i><strong>Age Requirement:</strong>
                                                <?php echo $row['min_age']; ?> years
                                                or older.
                                            </li>
                                            <li><i class="bx bxs-circle me-2"></i><strong>Event Type:</strong>
                                                <?php echo $row['type']; ?>
                                                running event
                                            </li>
                                            <li><i class="bx bxs-circle me-2"></i><strong>Flag-Off Time:</strong>
                                                <?php echo $row['fo_time']; ?>
                                            </li>
                                            <li><i class="bx bxs-circle me-2"></i><strong>Cut-Off-Time:</strong>
                                                <?php echo $row['co_time']; ?>
                                            </li>
                                            <!-- Add more details as needed -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pricing-horizontal-tag col-md-3 text-center pt-3 d-flex align-items-center">
                    <div class="w-100 light-300">
                        <p>RM
                            <?php echo $row['price'] ?>
                        </p>
                        <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"
                            onclick="togglePopup<?php echo $row['id'] ?>()">Register</a>
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->
            <!-- Popup Window -->
            <div class="popup" id="popup-<?php echo $row['id'] ?>">
                <div class="overlay"></div>
                <div class="content">
                    <a href="#<?php echo $row['tag'] ?>"><button type="button" class="btn-close" aria-label="Close"
                            onclick="togglePopup<?php echo $row['id'] ?>()"></button></a>
                    <h5>
                        <?php echo $row['category_name'] ?>
                    </h5>
                    <strong>Price : </strong> RM
                    <?php echo $row['price'] ?>.00 <br>
                    <strong>Date : </strong> 12 February 2024 <br>
                    <strong>Location : </strong> Dataran Merdeka <br>
                    <strong>Flag Off Time : </strong>
                    <?php echo $row['fo_time'] ?> <br>
                    <strong>Distance : </strong>
                    <?php echo $row['distance'] ?>KM <br> <br>
                    <script>
                        addCategory(<?php echo $row['id'] ?>);
                    </script>
                    <!--<a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"> -->
                    Register</a>
                </div>
            </div>
            <?php
            if (isset($_SESSION['id'])) {
                echo '
                    <script>
                    function togglePopup' . $row["id"] . '() {
                        document.getElementById("popup-' . $row["id"] . '").classList.toggle("active");
                    }
                    </script>
                    ';
            } else {
                echo '
                    <script>
                    function togglePopup' . $row["id"] . '() {
                            window.location.href = "signin.php";
                    }
                    </script>
                    ';

            }
            if ($index < 3) {
                $index +=1;
            } else {
                $index = 0;
            }
        }
        ?>

        <hr class="mt-5">

        <!-- Accordion for Rules and Regulations -->
        <div class="accordion col-10 m-auto mt-5 bg-light" id="accordionRulesRegulations">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRulesRegulations">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseRulesRegulations" aria-expanded="false"
                        aria-controls="collapseRulesRegulations">
                        Event Rules and Regulations
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </h2>
                <div id="collapseRulesRegulations" class="accordion-collapse collapse"
                    aria-labelledby="headingRulesRegulations" data-bs-parent="#accordionRulesRegulations">
                    <div class="accordion-body">


                        <ol class="light-300">
                            <li>The Organiser reserves the right to modify or substitute any of these Rules and
                                Regulations of the Event from time to
                                time as they deem fit. If there is ambiguity in any of the provisions, the Organiser
                                shall be the authority to interpret
                                and in doing so, the Organiser will take into account the interests of all the affected
                                Participants.</li>

                            <li>The Organiser reserves the right to prevent a participant's continuation in the race
                                should they fail to comply with
                                the rules and regulations.</li>

                            <li>Any disputes arising from participation in the UPM FUNRUN 2024 shall be referred to
                                Arbitration to be conducted in Malaysia within
                                the Laws of Malaysia.</li>

                            <li>In response to future decisions from Malaysia authorities (if any) or in any unforeseen
                                circumstances, the The Organiser has
                                the right to convert UPM FUNRUN 2023 to be a virtual event. Further arrangement
                                regarding registration will then be announced later.</li>
                        </ol>

                        <p>Registration</p>
                        <ol class="light-300">
                            <li>The Organiser shall not be responsible for any disputes arising from incomplete entry
                                details.</li>

                            <li>All entries are based on a first-come first-serve basis unless otherwise stated.</li>

                            <li>The UPM FUNRUN 2024 is open to all Malaysian citizen who holds a valid Malaysian
                                Passport and/or Malaysian IC,
                                foreign nationals with residence pass or working permit and International runners with
                                valid passport.</li>

                            <li>Age qualification is taken as at 31st December 2024.</li>

                            <li>Runners aged below 18 must be accompanied and/or get permission from parent who will
                                also be fully responsible for the children's
                                participation. Parent/guardian who wish to accompany must register for the event.</li>

                            <li>Upon confirmation of participation, change to the category or other details will not be
                                entertained. Any change of
                                category requires a new registration.</li>
                        </ol>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Rules and Regulations Accordion -->
        <!-- Accordion for Registration Information -->
        <div class="accordion col-10 m-auto mt-3 bg-light" id="accordionRegistrationInfo">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRegistrationInfo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseRegistrationInfo" aria-expanded="false"
                        aria-controls="collapseRegistrationInfo">
                        How to Register
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </h2>
                <div id="collapseRegistrationInfo" class="accordion-collapse collapse"
                    aria-labelledby="headingRegistrationInfo" data-bs-parent="#accordionRegistrationInfo">
                    <div class="accordion-body">
                        <p class="light-300">
                            To participate in our event, follow these steps to complete the registration process:
                        </p>
                        <ol class="light-300">
                            <li>Visit our official event website.</li>
                            <li>Select the desired category (Full Marathon, Half Marathon, 5K Fun Run, Family Charity
                                Run).</li>
                            <li>Fill out the registration form with your details.</li>
                            <li>Complete the payment process.</li>
                            <li>You will receive a confirmation email upon successful registration.</li>
                        </ol>
                        <!-- Add more registration information as needed -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Registration Info Accordion -->

        <!-- Accordion for Race Kit Collection -->
        <div class="accordion col-10 m-auto mt-3 bg-light" id="accordionRaceKitCollection">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRaceKitCollection">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseRaceKitCollection" aria-expanded="false"
                        aria-controls="collapseRaceKitCollection">
                        Race Kit Collection
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </h2>
                <div id="collapseRaceKitCollection" class="accordion-collapse collapse"
                    aria-labelledby="headingRaceKitCollection" data-bs-parent="#accordionRaceKitCollection">
                    <div class="accordion-body">
                        <p class="light-300">
                            Follow these steps to collect your race kit before the event day:
                        </p>
                        <ol class="light-300">
                            <li>Date:
                                <ul>
                                    <li>9th February 2024</li>
                                </ul>
                            </li>

                            <li>Venue:
                                <ul>
                                    <li>Bangunan Canselori Putra, UPM</li>
                                </ul>
                            </li>
                            <br>
                            <li>Visit the designated race kit collection venue mentioned above.</li>
                            <li>Bring a copy of your confirmation email and a valid photo ID for verification.</li>
                            <li>Foreign nationals with Permanent Resident pass or working permit must attach a copy as
                                proof during online registration.</li>
                            <li>There will be NO Race-Kit collection counter opened during the race day, hence no
                                race-kits will be issued to runners.
                                Outstation runners are advised to choose postage option to avoid missing the actual
                                racekit collection day.</li>
                            <li>Collect your race bib, timing chip, event jersey and any additional items provided in
                                the race kit.</li>
                            <li>Review the race day guidelines and information provided in the race kit.</li>
                            <li>If you are collecting the race kit on behalf of someone else, ensure you have their
                                authorization letter and a copy of their ID.</li>
                        </ol>
                        <!-- Add more race kit collection information as needed -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Race Kit Collection Accordion -->


    </div>

    <!-- stop editing section -->

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
</body>

</html>