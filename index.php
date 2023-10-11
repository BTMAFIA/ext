<!DOCTYPE html>
<html>
<head>
<title>Website</title>
</head>
<style>
	body{
		background-color: whitesmoke;
	}

	input{
		width: 30%;
		height: 5%;
		border: 1px;
		border-radius: 20px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow: 1px 1px 2px 1px grey;
	}

table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
</style>
<body>
	<form method = "post">
		<center>
			<input type = "text" name = "id" id = "id" placeholder = "Enter Id"><br>
			<input type = "text" name = "name" id = "name" placeholder = "Enter Name"><br>
			<input type = "text" name = "rollno" id = "rollno" placeholder = "Enter Roll no"><br>
			<input type = "text" name = "password" id = "password" placeholder = "Enter password"><br>
			<input type = "submit" value = "Insert" name = "btnInsert" style = "width: 10%;">
			<input type = "submit" value = "Update" name = "btnUpdate" style = "width: 10%;">
			<input type = "submit" value = "Delete" name = "btnDelete" style = "width: 10%;">
			<input type = "submit" value = "Search" name = "btnSearch" style = "width: 10%;">
			<input type = "submit" value = "Display" name = "btnDisplay" style = "width: 12%;">
		


		</center>
	</form>
</body>
</html>

<?php
$connect = mysqli_connect("localhost", "root", "", "fashion");

if(isset ($_POST["btnInsert"])) {
$name = $_POST["name"];
$rollno = $_POST["rollno"];
$password = $_POST["password"];
$insertq = "insert into fashiondata values(0, '$name', '$rollno', '$password')";
mysqli_query($connect, $insertq);
}

if(isset ($_POST["btnUpdate"])) {
$id = $_POST["id"];
$name = $_POST["name"];
$rollno = $_POST["rollno"];
$password = $_POST["password"];
$updateq = "update fashiondata set name = '$name', rollno =  '$rollno', password = '$password' where id = '$id'";
mysqli_query($connect, $updateq);
}


if(isset ($_POST["btnDelete"])) {
$id = $_POST["id"];
$deleteq = "delete from fashiondata where id = '$id'";
mysqli_query($connect, $deleteq);
}

if(isset ($_POST["btnSearch"])) { 
$id = $_POST["id"];
$searchq = "select * from fashiondata where id = '$id'";
$query = mysqli_query($connect, $searchq);
while($row = mysqli_fetch_array($query)) {
?>
<script>
            document.getElementById("id").value = "<?php echo $row['id']; ?>";
            document.getElementById("name").value = "<?php echo $row['name']; ?>";
            document.getElementById("rollno").value = "<?php echo $row['rollno']; ?>";
            document.getElementById("password").value = "<?php echo $row['password']; ?>";
</script>
<?php
}
}

if(isset($_POST["btnDisplay"])) {
    $displayq = "select * from fashiondata";
    $display_query = mysqli_query($connect, $displayq);
    ?>
    <table style = "padding : 8px 15px 8px 15px;">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll No</th>
            <th>Password</th>
        </tr>
    <?php
    while($row = mysqli_fetch_array($display_query)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['rollno'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>