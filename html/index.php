<?php 
$db = new PDO('sqlite:../DB/MainDB.db');

require ('util.php');
$casesByUser =getCasesByUser('test@oht.com');

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
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

  <link href="../css/new_css.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="semantic/dist/semantic.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">

      <div class="logo">
        <a href="" class="simple-text logo-normal">
          One Hour Translation
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
            <a class="nav-link" href="add.html">
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


        </ul>
      </div>

    </div>

    <div class="main-panel">

      <div class="content">
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="card card-plain">

              <div class="card-header card-header-primary">
                <div class="row">


                  <!--satatus-->

                  <div class="ui fluid selection dropdown dropdown-filter col-1">
                    <input type="hidden" name="status">
                    <i class="dropdown icon"></i>
                    <div class="default text">Status</div>
                    <div class="menu">
                      <div class="item" data-value="open">
                        Open
                      </div>
                      <div class="item" data-value="inProgress">
                        In Progress
                      </div>
                      <div class="item" data-value="resolved">
                        Resolved
                      </div>
                    </div>
                  </div>

                  <!--tags-->
                  <select name="tags" multiple="" class="ui fluid dropdown dropdown-filter col-1">
                    <option value="">Tags</option>
                    <option value="angular">Angular</option>
                    <option value="css">CSS</option>
                    <option value="design">Graphic Design</option>
                    <option value="ember">Ember</option>
                    <option value="html">HTML</option>
                    <option value="ia">Information Architecture</option>
                    <option value="javascript">Javascript</option>
                    <option value="mech">Mechanical Engineering</option>
                    <option value="meteor">Meteor</option>
                    <option value="node">NodeJS</option>
                    <option value="plumbing">Plumbing</option>
                    <option value="python">Python</option>
                    <option value="rails">Rails</option>
                    <option value="react">React</option>
                    <option value="repair">Kitchen Repair</option>
                    <option value="ruby">Ruby</option>
                    <option value="ui">UI Design</option>
                    <option value="ux">User Experience</option>
                  </select>

                  <!-- created by-->
                  <select class="ui search dropdown dropdown-filter">
                    <option value="">Created by</option>
                    <option value="AL">Alabama Jackson</option>
                    <option value="AK">Mlaska simpson</option>
                    <option value="AZ">Arizona France</option>
                    <option value="AR">Kansas London</option>
                    <option value="CA">Sali fornia</option>
                    <option value="CO">Polo Rado</option>
                    <option value="CT">Donna Cticut</option>
                    <option value="DE">Joh Delaware</option>
                    <option value="DC">Dean Columbia</option>
                    <option value="FL">Xor And</option>
                  </select>

                  <!--Assigned to-->
                  <select class="ui search dropdown dropdown-filter">
                    <option value="">Assigned to</option>
                    <option value="AL">Alabama Jackson</option>
                    <option value="AK">Mlaska simpson</option>
                    <option value="AZ">Arizona France</option>
                    <option value="AR">Kansas London</option>
                    <option value="CA">Sali fornia</option>
                    <option value="CO">Polo Rado</option>
                    <option value="CT">Donna Cticut</option>
                    <option value="DE">Joh Delaware</option>
                    <option value="DC">Dean Columbia</option>
                    <option value="FL">Xor And</option>
                  </select>
                  <!--created-->
                  <input type="date" id="created" class="datepicker ui search fluid" placeholder="Created at">
                  <!--closed-->
                  <input type="date" id="created" class="datepicker ui search fluid" placeholder="Closed at">
                  <!---search-->
                  <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>
                  ID
                </th>
                <th>
                  Subject
                </th>
                <th>
                  Assigned
                </th>
                <th>
                  Status
                </th>
                <th>
                  Created
                </th>
                <th>
                  Last Update
                </th>
              </thead>
              <tbody>
                  <?php foreach ($casesByUser as $case): ?>
               <tr>
                   <td></td>
               </tr>
               <?php endforeach ?>  
              </tbody>
            </table>
          </div>
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
  </div>
  </div>
  <div class="fixed-plugin">

    <!--dropdown-->
    <script>
      $('.ui.dropdown')
        .dropdown();
    </script>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
      $(document).ready(function () {
        $().ready(function () {
          $sidebar = $('.sidebar');

          $sidebar_img_container = $sidebar.find('.sidebar-background');

          $full_page = $('.full-page');

          $sidebar_responsive = $('body > .navbar-collapse');

          window_width = $(window).width();

          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

          if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
              $('.fixed-plugin .dropdown').addClass('open');
            }

          }

          $('.fixed-plugin a').click(function (event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $('.fixed-plugin .active-color span').click(function () {
            $full_page_background = $('.full-page-background');

            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
            }
          });

          $('.fixed-plugin .background-color .badge').click(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('background-color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data-background-color', new_color);
            }
          });

          $('.fixed-plugin .img-holder').click(function () {
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function () {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
              });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $full_page_background.fadeOut('fast', function () {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
              });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
          });

          $('.switch-sidebar-image input').change(function () {
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
              }

              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
              }

              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
              }

              if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
              }

              background_image = false;
            }
          });

          $('.switch-sidebar-mini input').change(function () {
            $body = $('body');

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              md.misc.sidebar_mini_active = false;

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

              setTimeout(function () {
                $('body').addClass('sidebar-mini');

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function () {
              window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function () {
              clearInterval(simulateWindowResize);
            }, 1000);

          });
        });
      });
    </script>
</body>

</html>