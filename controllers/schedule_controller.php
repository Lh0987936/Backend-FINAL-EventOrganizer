<?php 
require "models/schedule_model.php";

$header = "partials/header.php"; 
$footer = "partials/footer.php";
$nav = "partials/nav.php";

function page_display($view) {
    global $header;
    global $footer;
    global $nav;

    $view = __DIR__ . "/../views/$view.php";
    include $header;
    include $nav;
    include $view;
    include $footer;
    //Easy and simple way to make each page in formula, setting up our established partials around the view.
}
function registrations_display($view) {
    global $header;
    global $nav;
    global $footer;
    if (isset($_GET['event']) && is_int($_GET['event']))
    {
        $event_id = $_GET['event'];
        $registrations = list_registered_by_event($event_id);
        include $header;
        include $nav;
        include $view;
    }
    else {
        $view = "404";
        $error_msg = "eventID not found";
        page_display($view);
    }

}

?>