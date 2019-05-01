<div class="sidebar" data-color="purple" data-background-color="white" >

<div class="logo">
    <a href="./" class="simple-text logo-normal">
        title for the nav bar
    </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item  ">
            <a class="nav-link" href="../profile.html">
                <i class="material-icons">person</i>
                <p>Profile</p>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="./new.php">
                <i class="material-icons">add</i>
                <p>Add Event</p>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="html/search.html">
                <i class="material-icons">search</i>
                <p>Search Event</p>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="../report.html">
                <i class="material-icons">dashboard</i>
                <p>Reports</p>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="./settings.html">
                <i class="material-icons">settings</i>
                <p>Setting</p>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="./logout.php">
                <i class="material-icons">settings</i>
                <p>Logout</p>
            </a>
        </li>
    </ul>

    <p style="font-size: 14px;padding: 10px;">Logged in as <strong><?= $_SESSION['email'] ?></strong></p>
</div>

</div>