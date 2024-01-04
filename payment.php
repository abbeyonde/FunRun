<!DOCTYPE html>
<html lang="en">

<head>
  <title>UNI10Marathon</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Load Require CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- Font CSS -->
  <link href="assets/css/boxicon.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
  <!-- Load Tempalte CSS -->
  <link rel="stylesheet" href="assets/css/templatemo.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/custom.css" />

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

    .bg-red {
      background-color: red;
    }

    /*CSS FOR PAYMENT*/
    .free-button {
      background: #1565c0;
      height: 52px;
      font-size: 15px;
      border-radius: 8px;
    }

    .payment-card-body {
      flex: 1 1 auto;
      padding: 24px 1rem !important;
    }

    .pay-later{
      background-color: gray;
      border-color: gray;
    }

  </style>
  <script>
    const user = window.sessionStorage.getItem("user");
  </script>
</head>

<body>
  <?php
  include('connect.php');
  include('participantsession.php');
  $category = $_GET['category'];

  $sql = "SELECT * FROM registered_participants WHERE participant_ic=$participant AND paid=1";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  ?>

  <!-- Header
  <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand h1" href="index.php">
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
              <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.php#about">About
                Us</a>
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
           <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a> ->
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
              window.location.href = "index.php";
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
  Close Header -->
  <?php
  if (!isset($row)) {
    ?>
    <!-- Edit here-->
    <div class="container py-5">
      <div class="container mt-5 mb-5">
        <div class="row justify-content-center g-3">
          <div class="col-md-4">
            <span>Payment Method</span>
            <div class="card">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header p-0" id="headingTwo">
                    <h2 class="mb-0">
                      <button style="width: 100%"
                        class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                        <div class="d-flex align-items-center justify-content-between">
                          <span>Touch`n Go eWallet</span>
                          <img src="assets/img/TouchnGo-eWallet.svg" width="30" alt="tng ewallet logo" />
                        </div>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-toggle="collapse"
                    data-target="#collapseTwo">
                    <div class="card-body">
                      <input type="text" class="form-control" placeholder="Touch'n Go email" />
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header p-0">
                    <h2 class="mb-0">
                      <button style="width: 100%" class="btn btn-light btn-block text-left p-3 rounded-0"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        <div class="d-flex align-items-center justify-content-between">
                          <span class="">Debit Card/Credit Card</span>
                          <div class="icons">
                            <img src="assets/img/mastercard.png" width="30" alt="mastercard logo" />
                            <img src="assets/img/visa.png" width="30" alt="visa logo" />
                            <img src="assets/img/MyDebit.png" width="30" alt="mydebit logo" />
                          </div>
                        </div>
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-toggle="collapse"
                    data-target="#collapseOne">
                    <div class="card-body payment-card-body">
                      <span class="font-weight-normal card-text">Card Number</span>
                      <div class="input">
                        <i class="fa fa-credit-card"></i>
                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000" />
                      </div>

                      <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                          <span class="font-weight-normal card-text">Expiry Date</span>
                          <div class="input">
                            <i class="fa fa-calendar"></i>
                            <input type="text" class="form-control" placeholder="MM/YY" />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <span class="font-weight-normal card-text">CVC/CVV</span>
                          <div class="input">
                            <i class="fa fa-lock"></i>
                            <input type="text" class="form-control" placeholder="000" />
                          </div>
                        </div>
                      </div>

                      <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured
                        with ssl certificate</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <span>Summary</span>

            <div class="card">
              <div class="d-flex justify-content-between p-3">
                <div class="d-flex flex-column">
                  <span>Half Marathon (Category A) <i class="fa fa-caret-down"></i></span>
                </div>

                <div class="mt-1">
                  <span>RM</span>
                  <span>*Price*</span>
                </div>
              </div>

              <hr class="mt-0 line" />

              <div class="p-3">
                <div class="d-flex justify-content-between mb-2">
                  <span>New User Discount</span>
                  <span>-RM5.00</span>
                </div>

                <div class="d-flex justify-content-between">
                  <span>Processing Fee <i class="fa fa-clock-o"></i></span>
                  <span>RM3.00</span>
                </div>
              </div>

              <hr class="mt-0 line" />

              <div class="p-3 d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <span>Total:</span>
                </div>
                <span>RMxx.xx</span>
              </div>

              <div class="p-3 text-center">
                <!--Add function to the button pls-->
                <!-- <button class="btn btn-primary mx-auto my-2"> -->
                <a class="btn btn-primary mx-auto my-2" href=<?php echo '"addCategory.php?ic=' . $participant . '&category=' . $category . '&paid=1" class="btn rounded-pill px-4 btn-outline-primary mb-3"'; ?>>
                  Create Payment
                </a>
                <!-- </button> -->
                <div class="text-center">
                  <!--Add link if u want-->
                  <a href="#">Have a promo code?</a>
                </div>
                <a class="btn btn-primary mx-auto my-2 rounded-pill pay-later" href=<?php echo '"addCategory.php?ic=' . $participant . '&category=' . $category .'&paid=0" class="btn rounded-pill px-4 btn-outline-primary mb-3"'; ?>>
                Pay Later
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="col-fit mx-auto mt-5">
      <h1>Fail to register</h1>
      <p>You have an existing participation at the moment.</p>
    </div>

  <?php } ?>
  <!-- stop editing section -->

  <!-- Start Footer -->
  <!-- <footer class="bg-secondary pt-4">
      <div class="container">
        <div class="row py-4 d-flex justify-content-lg-around">
          <div class="col-lg-3 col-12 align-left">
            <a class="navbar-brand" href="index.php">
              <i class="bx bx-buildings bx-sm text-light"></i>
              <span class="text-light h5">Fun</span
              ><span class="text-light h5 semi-bold-600">Run</span>
            </a>
            <p class="text-light my-lg-4 my-2">
              Get ready for a day of pure joy at our Fun Run! Picture smiling
              faces, vibrant costumes, and positive vibes. Bring your A-game,
              lace up, and join us for a day of laughter and unforgettable
              memories. See you there!
            </p>
            <ul class="list-inline footer-icons light-300">
              <li class="list-inline-item m-0">
                <a
                  class="text-light"
                  target="_blank"
                  href="http://facebook.com/"
                >
                  <i class="bx bxl-facebook-square bx-md"></i>
                </a>
              </li>
              <li class="list-inline-item m-0">
                <a
                  class="text-light"
                  target="_blank"
                  href="https://www.linkedin.com/"
                >
                  <i class="bx bxl-linkedin-square bx-md"></i>
                </a>
              </li>
              <li class="list-inline-item m-0">
                <a
                  class="text-light"
                  target="_blank"
                  href="https://www.whatsapp.com/"
                >
                  <i class="bx bxl-whatsapp-square bx-md"></i>
                </a>
              </li>
              <li class="list-inline-item m-0">
                <a
                  class="text-light"
                  target="_blank"
                  href="https://www.flickr.com/"
                >
                  <i class="bx bxl-flickr-square bx-md"></i>
                </a>
              </li>
              <li class="list-inline-item m-0">
                <a
                  class="text-light"
                  target="_blank"
                  href="https://www.medium.com/"
                >
                  <i class="bx bxl-medium-square bx-md"></i>
                </a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-4 my-sm-0 mt-4 col-fit">
            <h3 class="h4 pb-lg-3 text-light light-300">Our Website</h3>
            <ul class="list-unstyled text-light light-300">
              <li class="pb-2">
                <i class="bx-fw bx bxs-chevron-right bx-xs"></i
                ><a class="text-decoration-none text-light" href="">Home</a>
              </li>
              <li class="pb-2">
                <i class="bx-fw bx bxs-chevron-right bx-xs"></i
                ><a
                  class="text-decoration-none text-light py-1"
                  href="landing.html/#about"
                  >About Us</a
                >
              </li>
              <li class="pb-2">
                <i class="bx-fw bx bxs-chevron-right bx-xs"></i
                ><a class="text-decoration-none text-light py-1" href=""
                  >Category</a
                >
              </li>
              <li class="pb-2">
                <i class="bx-fw bx bxs-chevron-right bx-xs"></i
                ><a class="text-decoration-none text-light py-1" href=""
                  >Contact Us</a
                >
              </li>
            </ul>
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
    </footer> -->
  <!-- End Footer -->

  <!-- Load jQuery require for isotope -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Isotope -->
  <script src="assets/js/isotope.pkgd.js"></script>
  <!-- Page Script -->
  <script>
    $(window).load(function () {
      // init Isotope
      var $projects = $(".projects").isotope({
        itemSelector: ".project",
        layoutMode: "fitRows",
      });
      $(".filter-btn").click(function () {
        var data_filter = $(this).attr("data-filter");
        $projects.isotope({
          filter: data_filter,
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