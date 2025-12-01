<?php 
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

?>