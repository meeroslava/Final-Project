<?php 
require './util/session.php';
require './util/database.php';

restrictAccess();

function getAllUsers(){
    $db = getDB();
    $query = "select * from Users";
    $pdoStatement = $db->query($query);

    if(!$pdoStatement) {
        return [];
    }

    return $pdoStatement->fetchAll();
  
}

$users = getAllUsers()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        One Hour Translation
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->

    <link href="../css/new.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>

    <!--summernote rich text editor-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
   <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
    <!--<script src="../assets/js/plugins/jquery-3.4.0.js"></script>-->
    <script src="https://unpkg.com/tooltip.js"></script>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <? include './templates/nav.php' ?>

        <div class="main-panel">

            <div class="content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <form method="POST" action="./addevent.php" class="col-md-12">
                                <textarea name="description" style="display:none" id="hiddenArea"></textarea>
                                <div>
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title">Create event</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="./addevent.php" method="post">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" class="form-control col-md-10" id="subject"
                                                       required="true"
                                                    placeholder="Enter subject">
                                            </div>

                                            <div class="form-group">
                                                <label for="assigned">Assigned To:</label>
                                                <select name="assigned" class="form-control">
                                                <option selected>Unassigned</option>
                                                <?php foreach($users as $user): ?>
                                                    <option><?= $user['email'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                
                                            </div>

                                            <div class="form-group">
                                                <label for="description" name="description">Description</label>
                                                <div id="editor"></div>
                                            </div>

                                            <div style="margin: 0;padding: 0;">
                                                <div class="col-md-2 form-group" style="padding-left: 0; display: inline-block">
                                                    <label for="cause">What cause this issue?</label>
                                                    <input name="cause" class="form-control" />
                                                </div>

                                                <div class="col-md-2 form-group" style="display: inline-block;padding-left: 0">
                                                    <label for="cause-date">The time we detected the cause:</label>
                                                    <input type="date" name="cause-date" class="form-control" />
                                                </div>

                                            </div>
                                            <div class="col-sm-10">
                                                <div class="row">

                                                    <div class="form-group col-md-4" style="padding-left: 0;">
                                                        <label for="jira">Jira ticket:</label>
                                                        <input type="text" name="jira" class="form-control" id="jira"
                                                            placeholder="Enter ticket URL">
                                                    </div>


                                                    <div class="form-group col-md-2" style="padding-left: 0;">
                                                        <label for="related">Related issue:</label>
                                                        <input type="text" name="related" class="form-control" id="related"
                                                            placeholder="Enter issue ID">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary" onClick="submitForm()">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
            <div class="container-fluid">
              <nav class="float-left">
                <ul>
                  <li>
                    <a href="https://www.creative-tim.com">
                      Creative Tim
                    </a>
                  </li>
                  <li>
                    <a href="https://creative-tim.com/presentation">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="http://blog.creative-tim.com">
                      Blog
                    </a>
                  </li>
                  <li>
                    <a href="https://www.creative-tim.com/license">
                      Licenses
                    </a>
                  </li>
                </ul>
              </nav>
              <div class="copyright float-right">
                &copy;
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
              </div>
            </div>
          </footer>
    <div class="fixed-plugin">

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });

            quill.on('text-change', () => {
                var value = quill.container.firstChild.innerHTML;
                $("textarea").val(value);
            })

        </script>


        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
        <!--<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>-->
       
        <!-- Plugin for the momentJs  -->
        <script src="../assets/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="../assets/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="../assets/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="../assets/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="../assets/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="../assets/js/plugins/arrive.min.js"></script>

        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <!-- <script src="../assets/demo/demo.js"></script> -->
    
    </div>
</body>

</html>