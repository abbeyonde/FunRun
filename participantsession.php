<?php

if (!isset($_GET['ic'])) {
    die("No ic specified");
}
$participant = $_GET['ic'] or die("no id specified");

?>