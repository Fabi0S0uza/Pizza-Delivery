<?php
	$conn = new mysqli("localhost","root","","PizzaDelivery");
	if($conn->connect_error){
		die("Conexão não sucedida!".$conn->connect_error);
	}

	$stmt = $conn->prepare('SELECT * FROM product');
if (!$stmt) {
    die('Error preparing statement: ' . $conn->error);
}

if (!$stmt->execute()) {
    die('Error executing statement: ' . $stmt->error);
}

$result = $stmt->get_result();
// Rest of your code to fetch data from the result set...

?>