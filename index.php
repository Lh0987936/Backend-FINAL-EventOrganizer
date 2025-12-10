<?php
require_once "controllers/schedule_controller.php";
session_start();
$view = filter_input(INPUT_GET, 'route') ?: 'event_list';
$action = filter_input(INPUT_POST, 'action');
$error_msg = "";
#Need a route, action, session
$public_views = ['event_list', 'event_register', 'event_details', 'admin_login', 'success_register'];
$public_actions = ['login', 'event_register', 'register'];

function check_admin()
{
    if (empty($_SESSION['admin_id'])) {
        header('Location: ?route=admin_login');
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
switch ($action) {
    case 'login':
        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if ($username && $password) {
            $user = find_admin($username);
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['admin_id'] = (int)$user['id'];
                $_SESSION['admin_name'] = $user['username'];
                $view = 'A_event_manage';
            } else {
                $login_error = "Incorrect Credentials.";
                $view = "admin_login";
            }
        } else {
            $login_error = "enter both fields.";
            $view = "admin_login";
        }
        break;
    case 'logout':
        $_SESSION = [];
        session_destroy();
        session_start();
        $view = 'admin_login';
        break;
    case 'register':
        $eventID = ($_POST['eventID']);
        $email = trim((string)($_POST['email']));
        $name = trim((string)($_POST['name']));
        if ($eventID && $email && $name) {
            register($eventID, $email, $name);
            $view = 'success_register';
        } else {
            $register_error = "Complete all fields";
            $view = 'event_register';
        }
        break;
    case 'event_register':
        $eventID = ($_POST['event']);
        if (!$eventID) {
            $view = '404';
        } else {
            $view = 'event_register';
        }
        break;
    case 'edit_build':
        $eventID = ($_POST['event']);
        if (!$eventID) {
            $view = '404';
        } else {
            $view = 'A_edit';
        }
        break;
    case 'Edit':
        break;
    case 'Add':
        break;
    case 'Delete':
        break;
}

switch ($view) {
    case 'event_list':
    case 'event_register':
    case 'event_details':
    case 'admin_login':
    case 'success_register':
    case 'A_edit':
    case 'A_add':
    case 'A_event_manage':
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
