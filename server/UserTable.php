
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    User Table
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="semantic/dist/semantic.min.js"></script>
</head>
<body>          

                  
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr id='1'>
							     	<th>ID</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Role</th>	
                                    <th class="text-left"></th>
                                </tr
                            </thead>
							<tbody>						

<?php 
$db = new PDO('sqlite:../DB/MainDB.db');
    $query = "Select * from Users" ;
    $pdoStatement = $db->query($query);
$users = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <?php  $index = 1  ?>
<?php foreach($users as $key): ?>
                    <tr> 
					<form method="post" action="../server/updateUser.php" id="updateUser">
					     <td >
						 <?= $index ?>
						 </td>
					     <td class="inputColumns" name="Email">
                          <?= $key['email'] ?>
                        </td>
                        <td  class="editableColumns" name="Name">
                        <?= $key['name'] ?>
                        </td>
                        <td  class="editableColumns" name="Role">
                        <?= $key['role'] ?>
                        </td>
						
                        <td class="td-actions text-left">
                                        <button id='editBtn' type="button" class="editValues" rel="tooltip" class="btn btn-success" >
                                            <i class="material-icons">edit</i>
                                        </button>
                        </td>						
					</form>
		 
                    </tr> 
					<?php $index = $index + 1 ?>
                    <?php endforeach; ?>

	                </tbody>
					</table>
					</div>
	                </body>

<!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

		
	
	<script type="text/javascript"> 
$('.editValues').click(
	function () {
		if ("submit" === $(this).attr("type")) { // 2nd time
			// update DB
			alert("updating");
			
		} else { // 1st time
			// change button
			var buttonhtml = $(this).html();
			var buttoninput = $('<i class="material-icons">save</i></button>');
			buttoninput.val(buttonhtml);
			$(this).html(buttoninput);
			// mark button as 'update' mode
			$(this).attr("type","submit");
			//$(this).attr("onclick","update()");
			
			// change row to text - editable columns
			$(this).parents('tr').find('td.editableColumns').each(
				function() {	
					var name = $(this).attr("name");
					var html = ($(this).html()).trim();
					var input = $('<input class="editableColumnsStyle" type="text" name="' + name + '"/>');
					input.val(html);
					$(this).html(input);
				}
			);
			
			// change row to text - input columns
			$(this).parents('tr').find('td.inputColumns').each(
				function() {
					var name = $(this).attr("name");
					var html = ($(this).html()).trim();
					var input = $('<input class="inputColumns" name="' + name + '" readonly/>');
					input.val(html);
					$(this).html(input);
				}
			);
		}
	}
);

</script>

</html>

 