     <!DOCTYPE html>
  <html lang="en">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
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

    <?php 
                                       //$db = new PDO("mysql:host=127.0.0.1;dbname=demo",'root', '');
                                       $db = new PDO("mysql:host=my-mysql;dbname=final-project", 'root', '123456');
                                       $query = "Select * from Users" ;
                                       $pdoStatement = $db->query($query);
                                       $users = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php  $index = 1  ?>
	        
    <style>
       body {font-family: Arial, Helvetica, sans-serif;}
       * {box-sizing: border-box;}
       /* Button used to open the contact form - fixed at the bottom of the page */
       .open-button {
          background-color: #555;
          color: white;
          padding: 10px 14px;
          border: none;
          cursor: pointer;
          opacity: 0.8;
          position: fixed;
          bottom: 23px;
          right: 28px;
          width: 150px;
       }

       /* The popup form - hidden by default */
       .form-popup {
          display: none;
          position: fixed;
          bottom: 0;
          right: 15px;
          border: 3px solid #f1f1f1;
          z-index: 9;
       }

       /* Add styles to the form container */
       .form-container {
          max-width: 300px;
          padding: 10px;
          background-color: white;
       }
	   /* Full-width input fields */
       /* .form-container input[type=text], .form-container input[type=email] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
       }*/

       /* When the inputs get focus, do something */
       .form-container input[type=text]:focus, .form-container input[type=email]:focus {
           background-color: #ddd;
           outline: none;
       } 
	   /* Set a style for the submit/login button */
       .form-container .btn {
          background-color: #4CAF50;
          color: white;
          padding: 10px 14px;
          border: none;
          cursor: pointer;
          width: 100%;
          margin-bottom:10px;
          opacity: 0.8;
       }
	   /* Add a red background color to the cancel button */
       .form-container .cancel {
          background-color: red;
       }
	   /* Add some hover effects to buttons */
       .form-container .btn:hover, .open-button:hover {
          opacity: 1;
       }
    </style>
	
    <div class="form-popup" id="myForm">
       <form method="post" action="../server/updateUser.php" class="form-container" id="myForm1">
        
         <label for="Email"><b>Email</b></label>
         <input type="email" placeholder="Enter Email" name="Email" required>

         <label for="Name"><b>Name</b></label>
         <input type="text" placeholder="Enter Name" name="Name" required>
	     </br>
      	 <label for="Role"><b>Role</b></label>
         <select name="Role" form="myForm1"  required="" >
	   				       	<option value=" ">****</option>
                            <option value="user">user</option>
                            <option value="Admain">Admin</option>                          
          </select>
          <button type="submit" class="btn">Update</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
       </form>
     </div>
     <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
      </script>	
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
                                    <th class="td-actions text-left">
									     <button id='editBtn' onclick="openForm()" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button>
									</th>
                 </tr>
            </thead>
	    	<tbody>	
                   <?php foreach($users as $key): ?>
                    <tr> 
					    <form method="post" action="../server/updateUser.php" id="updateUser">
					     <td name="Index">
	   			    		 <?= $index ?>
						 </td>
					     <td class="inputColumns" name="Email">
                             <?= $key['email']?>
                         </td>
                         <td  class="editableColumns" name="Name">
                             <?= $key['name'] ?>
                         </td>
                         <td  class="editableColumns" name="Role">
                            <?= $key['role'] ?>
                         </td>
					   	<!-- <td class="td-actions text-left">
                                        <button id='editBtn' type="button" class="editValues" rel="tooltip" class="btn btn-success" >
                                            <i class="material-icons">edit</i>
                                        </button>
                         </td>    --!>						 										
		                </form>		 
                    </tr> 
                    <?php $index = $index + 1 ?>
                   <?php endforeach; ?>
	        </tbody>
        </table>
       </div>

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
</body>
</html> 