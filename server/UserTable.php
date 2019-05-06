<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table with database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
</head>
<body>

<table>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Name</th>
        <th>User</th>
        <th>Created</th>
    </tr>	
</table>


<?php 
$db = new PDO('sqlite:../DB/MainDB.db');
    $query = "Select * from Users" ;
    $pdoStatement = $db->query($query);


$users = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
 ?>

<table>
<?php foreach($users as $key): ?>
                    <tr>
					    <td>
                          "1"
                        </td>
                        <td>
                          <?= $key['email'] ?>
                        </td>
                        <td>
                        <?= $key['name'] ?>
                        </td>
                        <td>
                        <?= $key['role'] ?>
                        </td>
						<td>
                          <?= $date = date("Y-m-d H:i:s");?>
                        </td>						
                    </tr> 
                    <?php endforeach; ?>
</table>
	
   
</body>
</html>