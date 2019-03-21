<?php 
require_once"bootstrap.php";

unset($_SESSION);
session_destroy();

notification("You have Successfully Logout!!");
redirect("sign-in");


?>