<?php
$eventID = ($_POST['event']); 
$event = get_event_by_id($eventID);
?>
<h2>Edit</h2>
<form method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?=$event['title']?>"><br>
    <label for="desc">Description</label>
    <input type="text" name="desc" id="desc" value="<?=$event['description']?>"><br>
    <label for="location">Location</label>
    <input type="text" name="Location" id="Location" value="<?=$event['location']?>"><br>
    <label for="event_date">Date </label>
    <input type="datetime" name="date" id="date" value="<?=$event['event_date']?>"><br>
    <input type="hidden" name="eventID" value="<?=$event['id']?>">
    <input type="hidden" name="action" value="Edit">

    <button type="submit">Submit</button>
</form>