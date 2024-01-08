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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="category.php">Category</a>
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
                        echo "<a class=\"nav-link\" href=\"profile.php?ic=". $user."\"><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
                        echo "<a class=\"nav-link btn-outline-primary rounded-pill px-3 mx-3 register\" href='signout.php'>Sign Out</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>