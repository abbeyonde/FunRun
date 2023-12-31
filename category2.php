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

    ?>
    <script>
        const user = '<?php echo $_SESSION['id']; ?>';
        const from = 'category';
        const addCategory = (category) => {
            document.writeln('<a href="/FunRun/payment.php?ic=' + user + '&category=' + category + '&from='+from+'" class="btn rounded-pill px-4 btn-outline-primary mb-3">');

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
        <!-- Start Pricing Horizontal -->
        <div id="fullMarathon"
            class="pricing-horizontal row col-10 m-auto mt-5 d-flex shadow-sm rounded overflow-hidden bg-white">
            <div class="pricing-horizontal-icon col-md-3 text-center text-light py-4"
                style="background-color: rgba(163, 5, 5, 0.678);">
                <!--style="background-image: url('/assets/img/finish.png'); background-size:60%; background-position: center;"-->
                <!--image in menu-->
                <img src="assets/img/finish.png" alt="Marathon Image" width="60%" class="mt-3">
                <h5 class="h5 semi-bold-600 pb-4 light-300">Full Marathon</h5>
            </div>
            <div
                class="pricing-horizontal-body offset-lg-1 col-md-6 col-lg-5 d-flex align-items-center pl-4 pt-lg-0 pt-4">
                <div class="w-100">
                    <p class="mb-3 light-300">
                        Embark on a full-scale urban adventure with our Full Marathon. Cover 42.2 kilometers of diverse
                        cityscapes, from iconic landmarks to charming streets, as you push your limits and savor the
                        triumph at the heart of Kuala Lumpur.
                    </p>

                    <!-- Accordion for Details -->
                    <div class="accordion w-100 bg-white" id="accordionFullMarathon">
                        <div class="accordion-item ">
                            <h2 class="accordion-header" id="headingFullMarathon">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFullMarathon" aria-expanded="true"
                                    aria-controls="collapseFullMarathon">
                                    Details
                                </button>
                            </h2>
                            <div id="collapseFullMarathon" class="accordion-collapse collapse "
                                aria-labelledby="headingFullMarathon" data-bs-parent="#accordionFullMarathon">
                                <div class="accordion-body">
                                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                                        <li><i class="bx bxs-circle me-2"></i><strong>Distance:</strong> 42.2 kilometers
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Age Requirement:</strong> 18 years
                                            or older.</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Event Type:</strong> Competitive
                                            running event</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Flag-Off Time:</strong> 0400 a.m.
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Cut-Off-Time:</strong> 7 hours and
                                            15 minutes</li>
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
                    <p>RM60</p>
                    <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"
                        onclick="togglePopup1()">Register</a>
                </div>
            </div>
        </div>
        <!-- End Pricing Horizontal -->
        <!-- Popup Window -->
        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <a href="#fullMarathon"><button type="button" class="btn-close" aria-label="Close"
                        onclick="togglePopup1()"></button></a>
                <h5>Full Marathon</h5>
                <strong>Price : </strong> RM60 <br>
                <strong>Date : </strong> 12 February 2024 <br>
                <strong>Location : </strong> Dataran Merdeka <br>
                <strong>Flag Off Time : </strong> 0400am <br>
                <strong>Distance : </strong> 42.2km <br> <br>
                <script>
                    addCategory(1);
                </script>
                <!--<a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"> -->
                Register</a>
            </div>
        </div>
        <?php
        // echo '
        // <script>
        // function togglePopup1() {
        //     if (' . $_SESSION['id'] . ') {
        //         document.getElementById("popup-1").classList.toggle("active");
        //     }
        //     else {
        //         window.location.href = "signin.php";
        //     }

        // }
        // </script>
        // ';
        if (isset($_SESSION['id'])) {
            echo '
            <script>
            function togglePopup1() {
                document.getElementById("popup-1").classList.toggle("active");
            }
            </script>
            ';
        }
        else{
            echo '
            <script>
            function togglePopup1() {
                    window.location.href = "signin.php";
            }
            </script>
            ';

        }
        ?>


        <!--End Popup Window-->
        rgb(55, 55, 117)
        rgb(226, 134, 59)
        rgb(209, 206, 46)
        <!-- Start Pricing Horizontal -->
        <div id="halfMarathon"
            class="pricing-horizontal row col-10 m-auto mt-5 d-flex shadow-sm rounded overflow-hidden bg-white">
            <div class="pricing-horizontal-icon col-md-3 text-center text-light py-4"
                style="background-color: rgb(55, 55, 117)">
                <!--image in menu-->
                <img src="assets/img/half-marathon.png" alt="Marathon Image" width="50%" class="mt-3">
                <h5 class="h5 semi-bold-600 pb-4 light-300">Half Marathon</h5>
            </div>
            <div
                class="pricing-horizontal-body offset-lg-1 col-md-6 col-lg-5 d-flex align-items-center pl-4 pt-lg-0 pt-4">
                <div class="w-100">
                    <p class="mb-3 light-300">
                        Experience the pulse of Kuala Lumpur in our Half Marathon. Navigate 21.1 kilometers of the
                        city's dynamic terrain, offering a mix of urban challenges and scenic delights. Your journey
                        unfolds amidst the vibrant energy of Kuala Lumpur's heart.
                    </p>

                    <!-- Accordion for Details -->
                    <div class="accordion w-100" id="accordionHalfMarathon">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingHalfMarathon">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseHalfMarathon" aria-expanded="true"
                                    aria-controls="collapseHalfMarathon">
                                    Details
                                </button>
                            </h2>
                            <div id="collapseHalfMarathon" class="accordion-collapse collapse"
                                aria-labelledby="headingHalfMarathon" data-bs-parent="#accordionHalfMarathon">
                                <div class="accordion-body">
                                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                                        <li><i class="bx bxs-circle me-2"></i><strong>Distance:</strong> 21.1 kilometers
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Age Requirement:</strong> 18 years
                                            or older.</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Event Type:</strong> Competitive
                                            running event</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Flag-Off Time:</strong> 0430 a.m.
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Cut-Off-Time:</strong> 4 hours
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
                    <p>RM60</p>
                    <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"
                        onclick="togglePopup2()">Register</a>
                </div>
            </div>
        </div>
        <!-- End Pricing Horizontal -->
        <!-- Popup Window -->
        <div class="popup" id="popup-2">
            <div class="overlay"></div>
            <div class="content">
                <a href="#halfMarathon"><button type="button" class="btn-close" aria-label="Close"
                        onclick="togglePopup2()"></button></a>
                <h5>Half Marathon</h5>
                <strong>Price : </strong> RM60 <br>
                <strong>Date : </strong> 12 February 2024 <br>
                <strong>Location : </strong> Dataran Merdeka <br>
                <strong>Flag Off Time : </strong> 0430am <br>
                <strong>Distance : </strong> 21.1km <br> <br>

                <script>
                    addCategory(2);
                </script>
                <!-- <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"> -->
                Register</a>
            </div>
        </div>

        <?php
        if (isset($_SESSION['id'])) {
            echo '
            <script>
            function togglePopup2() {
                document.getElementById("popup-2").classList.toggle("active");
            }
            </script>
            ';
        }
        else{
            echo '
            <script>
            function togglePopup2() {
                    window.location.href = "signin.php";
            }
            </script>
            ';

        }
        ?>
        <!--End Popup Window-->

        <!-- Start Pricing Horizontal -->
        <div id="funRun"
            class="pricing-horizontal row col-10 m-auto mt-5 d-flex shadow-sm rounded overflow-hidden bg-white">
            <div class="pricing-horizontal-icon col-md-3 text-center text-light py-4"
                style="background-color: rgb(226, 134, 59)">
                <!--image in menu-->
                <img src="assets/img/5kfunrun2.png " alt="Marathon Image" width="50%" class="mt-3 mb-1">
                <h5 class="h5 semi-bold-600 pb-4 light-300">5km Fun Run</h5>
            </div>
            <div
                class="pricing-horizontal-body offset-lg-1 col-md-6 col-lg-5 d-flex align-items-center pl-4 pt-lg-0 pt-4">
                <div class="w-100">
                    <p class="mb-3 light-300">
                        Join the rhythm of the city in our 5km Fun Run. Whether you're a seasoned runner or new to the
                        scene, enjoy a spirited 5-kilometer journey through the heart of Kuala Lumpur, where each step
                        echoes the diverse beats of the city.
                    </p>

                    <!-- Accordion for Details -->
                    <div class="accordion w-100" id="accordion5kFunRun">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading5kFunRun">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse5kFunRun" aria-expanded="true"
                                    aria-controls="collapse5kFunRun">
                                    Details
                                </button>
                            </h2>
                            <div id="collapse5kFunRun" class="accordion-collapse collapse"
                                aria-labelledby="heading5kFunRun" data-bs-parent="#accordion5kFunRun">
                                <div class="accordion-body">
                                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                                        <li><i class="bx bxs-circle me-2"></i><strong>Distance:</strong> 5.0 kilometers
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Age Requirement:</strong> 16 years
                                            or older.</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Event Type:</strong> Competitive
                                            running event</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Flag-Off Time:</strong> 0700 a.m.
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Cut-Off-Time:</strong> 1 hour and
                                            30 minutes</li>
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
                    <p>RM60</p>
                    <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"
                        onclick="togglePopup3()">Register</a>
                </div>
            </div>
        </div>
        <!-- End Pricing Horizontal -->
        <!-- Popup Window -->
        <div class="popup" id="popup-3">
            <div class="overlay"></div>
            <div class="content">
                <a href="#funRun"><button type="button" class="btn-close" aria-label="Close"
                        onclick="togglePopup3()"></button></a>
                <h5>5km Fun Run</h5>
                <strong>Price : </strong> RM60 <br>
                <strong>Date : </strong> 12 February 2024 <br>
                <strong>Location : </strong> Dataran Merdeka <br>
                <strong>Flag Off Time : </strong> 0700am <br>
                <strong>Distance : </strong> 5.0km <br> <br>
                <script>
                    addCategory(3);
                </script>
                <!-- <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"> -->
                Register</a>
            </div>
        </div>

        <?php
        if (isset($_SESSION['id'])) {
            echo '
            <script>
            function togglePopup3() {
                document.getElementById("popup-3").classList.toggle("active");
            }
            </script>
            ';
        }
        else{
            echo '
            <script>
            function togglePopup3() {
                    window.location.href = "signin.php";
            }
            </script>
            ';

        }
        ?>
        <!--End Popup Window-->


        <!-- Start Pricing Horizontal -->
        <div id="charityRun"
            class="pricing-horizontal row col-10 m-auto mt-5 d-flex shadow-sm rounded overflow-hidden bg-white">
            <div class="pricing-horizontal-icon col-md-3 text-center text-light py-4"
                style="background-color: rgba(209, 206, 46, 0.87)">
                <!--image in menu-->
                <img src="assets/img/familywalk.png" alt="Marathon Image" width="50%" class="mt-3">
                <h5 class="h5 semi-bold-600 pb-4 light-300">Family Charity Run</h5>
            </div>
            <div
                class="pricing-horizontal-body offset-lg-1 col-md-6 col-lg-5 d-flex align-items-center pl-4 pt-lg-0 pt-4">
                <div class="w-100">
                    <p class="mb-3 light-300">
                        Share the joy of movement in our Family Charity Run, tailor-made for families and elderlies
                        alike. A shorter course filled with laughter and camaraderie, it's a family-friendly experience
                        weaving through the heartwarming tapestry of Kuala Lumpur's diverse streets.
                    </p>

                    <!-- Accordion for Details -->
                    <div class="accordion w-100" id="accordion3kFunRun">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3kFunRun">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3kFunRun" aria-expanded="false"
                                    aria-controls="collapse3kFunRun">
                                    Details
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="collapse3kFunRun" class="accordion-collapse collapse"
                                aria-labelledby="heading3kFunRun" data-bs-parent="#accordion3kFunRun">
                                <div class="accordion-body">
                                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                                        <li><i class="bx bxs-circle me-2"></i><strong>Distance:</strong> 3.0 kilometers
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Age Requirement:</strong> None
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Event Type:</strong> Fun Run</li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Flag-Off Time:</strong> 0730 a.m.
                                        </li>
                                        <li><i class="bx bxs-circle me-2"></i><strong>Cut-Off-Time:</strong> None</li>
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
                    <p>RM60</p>
                    <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"
                        onclick="togglePopup4()">Register</a>
                </div>
            </div>
        </div>
        <!-- End Pricing Horizontal -->
        <!-- Popup Window -->
        <div class="popup" id="popup-4">
            <div class="overlay"></div>
            <div class="content">
                <a href="#charityRun"><button type="button" class="btn-close" aria-label="Close"
                        onclick="togglePopup4()"></button></a>
                <h5>Family Charity Run</h5>
                <strong>Price : </strong> RM60 <br>
                <strong>Date : </strong> 12 February 2024 <br>
                <strong>Location : </strong> Dataran Merdeka <br>
                <strong>Flag Off Time : </strong> 0715am <br>
                <strong>Distance : </strong> 3.0km <br> <br>

                <script>
                    addCategory(4);
                </script>
                <!-- <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3"> -->
                Register</a>
            </div>
        </div>

        <?php
        if (isset($_SESSION['id'])) {
            echo '
            <script>
            function togglePopup4() {
                document.getElementById("popup-4").classList.toggle("active");
            }
            </script>
            ';
        }
        else{
            echo '
            <script>
            function togglePopup4() {
                    window.location.href = "signin.php";
            }
            </script>
            ';

        }
        ?>
        <!--End Popup Window-->
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