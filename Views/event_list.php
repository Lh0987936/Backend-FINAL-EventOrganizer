<?php
$rows = get_events();
?>

<h2>Events</h2>
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
            <td>
                <form method='post'>
                    <input type="hidden" name="event" value="<?=$row['id']?>">
                    <input type="hidden" name="action" value="event_detail">
                    <button type='submit' class="btn btn-sm btn-outline-secondary">Details</button>
                </form>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="event" value="<?=$row['id']?>">
                    <input type="hidden" name="action" value="event_register">
                    <button type='submit' class="btn btn-sm btn-outline-info">Register</button>
                </form>
            </td>
            </tr>
        <?php }?>
    </tbody>
</table>