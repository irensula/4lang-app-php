<?php 
session_start();

set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/lessonsManagement.php';
require_once 'controllers/dashboardManagement.php';

switch($route) {
    case "/home":
    case "/":
    case '' :
      require '.././views/home.view.php';
    break;

    case "/register":
      registerController();
    break;

    case "/login":
      loginController();
    break;

    case "/logout":
      logoutController();
    break;

    case "/profile":
      profileController();
    break;

    case "/lessons":
      lessonsController();
      // require '.././views/lessons.view.php';
    break;

    case "/dashboard":
      // dashboardController();
      require '.././views/dashboard.view.php';
    break;
    
    // case "/update_recipe":
    //   if(isLoggedIn()){
    //     if($method == "get"){
    //       editRecipeController();  
    //     } else {
    //       updateRecipeController();
    //     }
    //   } else {
    //     loginController();
    //   }
    // break;
    
    // case "/user":
    //   if(isLoggedIn()){
    //     viewUserPageController();
    //   } else {
    //     loginController();
    //   }
    // break;
    
    // case "/contacts":
    //   require '.././views/contacts.view.php';
    // break;


    default:
      echo "Error 404";
  }
