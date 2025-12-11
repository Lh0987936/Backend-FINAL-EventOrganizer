<h1>Welcome to Finale Schedules</h1>
<nav class='nav justify-content-center'>
    <a href="?route=event_list" class="nav-link">Events</a>
    <?php if (!isset($_SESSION['admin_id'])) { ?>
    <a href="?route=admin_login" class="nav-link">Admin Login</a>        
    <?php } ?>
    <?php if (isset($_SESSION['admin_id'])) { ?>
        <a href="?route=A_event_manage" class="nav-link">Manage</a>
        <form method="post">
            <input type="hidden" name="action" value="logout">
            <button class="btn btn-sm btn-outline-danger">Logout</button>
        </form>
    <?php } ?>
</nav>