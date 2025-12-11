<?php
$id = ($_POST['event']);
$event = get_event_by_id($id);
?>
<table class="table">
    <thead>
        <th>Title</th>
        <th>Date</th>
        <th>Location</th>
        <th>Description</th>
        <th>Register</th>
    </thead>
    <tbody>
            <tr>
            <td><?=htmlspecialchars($event['title'])?></td>
            <td><?=htmlspecialchars($event['event_date'])?></td>
            <td><?=htmlspecialchars($event['location'])?></td>
            <td><?= htmlspecialchars($event['description']) ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="event" value="<?=$event['id']?>">
                    <input type="hidden" name="action" value="event_register">
                    <button type='submit' class="btn btn-sm btn-outline-info">Register</button>
                </form>
            </td>
            </tr>
    </tbody>
</table>