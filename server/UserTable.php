<!DOCTYPE html>
<html lang="en">
<html>
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
        <th>Name</th>
        <th>Email</th>
        <th>UserName</th>
        <th>User</th>
        <th>Created</th>
    </tr>
    <?php

    $db = new PDO('sqlite:../DB/MainDB.db');

    $sql = "SELECT TOP 6 * FROM Users";

    $result = $db->query($sql);
	echo $result->num_rows;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["Name"] . "</td><td>". $row["Email"] . "</td><td>". $row["UserName"] . "</td><td>". $row["User"] . "</td><td>"
                . $row["Created"]. "</td></tr>";
        }
        echo "</table>";
    } else { 
		echo "0 results"; 
	}
    ?>
</table>
</body>
</html>