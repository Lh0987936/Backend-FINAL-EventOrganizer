<h1>Welcome to Finale Schedules</h1>
<nav>
    <a href="?route=event_list">Events</a>
    <a href="?route=admin_login">Admin</a>
    <!-- <?php if (isset($_SESSION['admin_id'])) { ?> -->
        <a href="?route=A_event_manage">Manage</a>
        <!-- <a href="?route=A_registrations">Registrations</a> -->
        <form method="post">
            <input type="hidden" name="action" value="logout">
            <button class="btn btn-sm btn-outline-danger">Logout</button>
        </form>
    <!-- <?php } ?> -->

</nav>