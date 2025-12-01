<?php 
require_once "controllers/schedule_controller.php";
session_start();
#Need a route, action, session
// $public_views = ['event_list','event_register','event_details','admin_login'];
// $public_actions = ['login','event_register'];

// function check_admin() {
//     if (!isset($_SESSION['admin_id'])) {
//         header('Location: ?route=admin_login.php');
//         exit;
//     }
//     //Checks the Session log to see if an admin has signed in.
// }
// $username = $_SESSION['username'];

// if ($action && !in_array($action, $public_actions, true)) {
//     check_admin();
// }
// if (!$action && !in_array($view, $public_views, true)) {
//     check_admin();
// }


$route = $_GET['route'] ?? 'event_list';
switch ($route) {
    case 'event_list':
    case 'event_register':
    case 'event_details':
    case 'admin_login':
        page_display($route);
        break;
    case 'A_registrations':
        registrations_display($route);
        break;
    default:
        page_display("404");
        break;
}
?>