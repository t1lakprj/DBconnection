<?php
// Retrieve user data submitted through the HTML form
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

// Sanitize user input data to prevent SQL injection attacks
//$name = mysqli_real_escape_string($conn, $name);
//$email = mysqli_real_escape_string($conn, $email);
//$mobile = mysqli_real_escape_string($conn, $mobile);

// Connect to the MySQL database
//$conn = mysqli_connect('localhost', 'prj', '12345', 'user');
$conn = mysqli_connect('userdatabase.crnah3igzvus.us-east-1.rds.amazonaws.com', 'admin', '12345678', 'userdatabase');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Insert user data into the database
$sql = "INSERT INTO user_info (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
if (mysqli_query($conn, $sql)) {
	echo "User information has been successfully stored in the database.";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the MySQL database connection
mysqli_close($conn);
?>

