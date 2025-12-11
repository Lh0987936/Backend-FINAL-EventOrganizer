<?php
$eventID = ($_POST['event']); 
$event = get_event_by_id($eventID);
?>
<h2>Edit</h2>
<form method="post">
    <label for="title" class='form-label'>Title</label>
    <input type="text" name="title" id="title" class='form-control' value="<?=$event['title']?>"><br>
    <label for="desc" class='form-label'>Description</label>
    <input type="text" name="desc" id="desc" class='form-control' value="<?=$event['description']?>"><br>
    <label for="location" class='form-label'>Location</label>
    <input type="text" name="location" id="location" class='form-control' value="<?=$event['location']?>"><br>
    <label for="event_date" class='form-label'>Date </label>
    <input type="datetime" name="date" id="date" class='form-control' value="<?=$event['event_date']?>"><br>
    <input type="hidden" name="eventID" value="<?=$event['id']?>">
    <input type="hidden" name="action" value="edit">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>