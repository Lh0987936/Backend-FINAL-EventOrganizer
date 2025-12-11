<?php
    $eventID = ($_POST['event']);
    $event = get_event_by_id($eventID);
    ?>

<h2> Register For <?=HTMLSPECIALCHARS($event['title'])?>
<form method="post" class='Form'>
    <input type="hidden" name="action" value="register">
    <input type="hidden" name="eventID" value=<?=$event['id']?>>
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" id="email" class="form-control"><br>
    <label for="name" class='form-label'>Name:</label>
    <input type="text" name="name" id="name" class='form-control'><br>
    <button type="submit" class="btn btn-sm btn-outline-success">Submit</button>
</form>