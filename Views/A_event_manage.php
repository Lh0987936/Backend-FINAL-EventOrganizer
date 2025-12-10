<?php //Admin Event Manager
$rows = get_events();
?>
<h2>Admin Dashboard</h2>
<br>
<h3>Events</h3>
<table class="table">
    <thead>
        <th>Title</th>
        <th>Date</th>
        <th>Location</th>
        <th>Description</th>
        <th>Register</th>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) {?>
            <tr>
            <td><?=htmlspecialchars($row['title'])?></td>
            <td><?=htmlspecialchars($row['event_date'])?></td>
            <td><?=htmlspecialchars($row['location'])?></td>
            <td><?=htmlspecialchars($row['description'])?></td>
            <td>
                <form method='post'>
                    <input type="hidden" name="event" value="<?=$row['id']?>">
                    <input type="hidden" name="action" value="edit_build">
                     <button type='submit' class="btn btn-sm btn-outline-warning">Edit</button>
                </form>
                <form method='post'>
                    <input type="hidden" name="event" value="<?=$row['id']?>">
                    <input type="hidden" name="action" value="delete">
                     <button type='submit' class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
            </tr>
        <?php }?>
    </tbody>
</table>