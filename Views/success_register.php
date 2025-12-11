<?php 
$eventID = ($_POST['eventID']);
$name = htmlspecialchars(trim((string)($_POST['name'])));
$event = get_event_by_id($eventID);
 ?>
<h2>Success!</h2>
<p>You've Registered for <?=HTMLSPECIALCHARS($event['title'])?>, <?=($name)?></p>
<div class="alert alert-info" role="alert">
<a href="?route=event_list">Click here to head back!</a>
</div>