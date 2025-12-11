<?php // Shows registrations grouped by event
$id = filter_input(INPUT_POST, 'event', FILTER_VALIDATE_INT);
$registered = list_registered_by_event($id);
?>
<?php if (count($registered) > 0) { ?>
    <h2>Registerations for <?= $registered[0]['title'] ?></h2>
    <table class=table>
        <thead>
            <th>Name</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php foreach ($registered as $row) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else {?>
    <h2>No Registrations</h2>
    <p>this event has not been registered for.</p>
    <?php } ?>