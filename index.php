<?php 
require_once "controllers/schedule_controller.php";
session_start();
$view = filter_input(INPUT_GET, 'route') ?: 'event_list';
$action = filter_input(INPUT_POST, 'action');
$error_msg = "";
#Need a route, action, session
$public_views = ['event_list','event_register','event_details','admin_login'];
$public_actions = ['login','event_register'];

function check_admin() {
    if (empty($_SESSION['admin_id'])) {
        header('Location: ?route=admin_login.php');
        exit;
    }
    // Checks the Session log to see if an admin has signed in.
}

if ($action && !in_array($action, $public_actions, true)) {
    check_admin();
}
if (!$action && !in_array($view, $public_views, true)) {
    check_admin();
}
switch($action) {
    case 'login':
        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if ($username && $password) {
            $user = find_admin($username);
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = (int)$user['id'];
                $_SESSION['user_name'] = $user['username'];
                $view = 'A_event_manage';
            }
            else {
                $login_error = "Incorrect Credentials.";
                $view = "admin_login";
            }
        } else {
            $login_error = "enter both fields.";
            $view = "admin_login";
        }
        break;
}

switch ($view) {
    case 'event_list':
    case 'event_register':
    case 'event_details':
    case 'admin_login':
        page_display($view);
        break;
    case 'A_registrations':
        registrations_display($view);
        break;
    default:
        $error_msg = "Page Not Found";
        $view = '404';
        page_display($view);
        break;
}
?>