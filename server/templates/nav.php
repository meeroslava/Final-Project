<div class="sidebar" data-color="purple" data-background-color="white" >

<div class="logo">
    <a href="./" class="simple-text logo-normal">
        One Hour Translation
    </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">

        <li class="nav-item ">
            <a class="nav-link" href="./index.php">
            <i class="material-icons">desktop_windows</i>
              <p>View tickets</p>
            </a>
        </li>

          <li class="nav-item ">
            <a class="nav-link" href="./new.php">
              <i class="material-icons">add</i>
              <p>Add Event</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="./reports.php">
              <i class="material-icons">dashboard</i>
              <p>Reports</p>
            </a>
          </li>

        <p style="font-size: 14px;padding: 10px;">Logged in as <strong><?= $_SESSION['email'] ?></strong></p>

        <li class="nav-item ">
            <a class="nav-link" href="./logout.php">
              <i class="material-icons">settings</i>
              <p>Logout</p>
            </a>
          </li>

        </ul>


    </ul>



</div>

</div>