
<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
</head>
<body>

<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit4">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=projet",'root','');

if (isset($_POST["submit4"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `avis` WHERE id = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Description</th>
                <th>typee</th>
                <th>datee</th>
			</tr>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->note;?></td>
                <td><?php echo $row->typee; ?></td>
				<td><?php echo $row->datee;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>
