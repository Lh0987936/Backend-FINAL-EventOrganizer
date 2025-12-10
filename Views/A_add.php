<h2>Add</h2>
<form method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title"><br>
    <label for="desc">Description</label>
    <input type="text" name="desc" id="desc"><br>
    <label for="location">Location</label>
    <input type="text" name="Location" id="Location"><br>
    <label for="event_date">Date </label>
    <input type="datetime" name="date" id="date"><br>
    <input type="hidden" name="eventID">
    <input type="hidden" name="action" value="ADD">

    <button type="submit">Submit</button>
</form>