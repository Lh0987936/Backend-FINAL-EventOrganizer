<?php
    $eventID = ($_POST['event']);
    $event = get_event_by_id($eventID);
    print_r($event);
    
    ?>

<h2> Register For <?=HTMLSPECIALCHARS($event['title'])?>
<form method="post" class='Form'>
    <input type="hidden" name="action" value="register">
    <input type="hidden" name="eventID" value=<?=$event['id']?>>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"><br>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name"><br>
    <button type="submit">Submit</button>
</form>