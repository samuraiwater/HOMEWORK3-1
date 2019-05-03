<?php

// Create connection
$conn = mysqli_connect("localhost","root","","testdb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully!";

// write query for all users
$sql = 'SELECT * FROM users';

//make query & get result
$result = mysqli_query($conn,$sql);

//fetch the resulting rows as an array
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//print_r($users);

?>

<!DOCTYPE html>
<html>

	<h4 class = "title grey-text center">Actors</h4>

	<div class = "container">
		<div class = "row">

			<?php foreach ($users as $user){ ?>

				<div class = "col s6 md3">
					<div class ="card z-depth-0">
						<div class ="card-content center">
							<h6><?php echo htmlspecialchars($user['id']); ?></h6>
							<div><?php echo htmlspecialchars($user['name']); ?>
							</div>
						   	<div class ="card-action right-align">
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</html>