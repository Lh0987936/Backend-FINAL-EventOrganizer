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
    //Easy and simple way to make each page in formula, setting up our established parrtials around the view.
}
function registrations_display() {
    global $header;
    global $nav;
    global $footer;
    $registrations = list_registered_by_event()
}

?>