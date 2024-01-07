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