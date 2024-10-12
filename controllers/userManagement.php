<?php
function loginController() {
    if(isset($_GET['fName'])) {
        $fName = htmlspecialchars($_GET['fName']);
        require 'views/login.view.php';
    } else {
        echo "First name is required!";
    }
}