<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '291036250';
    $DATABASE_NAME = 'car';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
	  <link rel="icon" type="image/x-icon" href="favicon.png">

		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
		  <img src="icons/unity.png" style=" padding:10px;"><h1 style="font-size: 30px; "> CRENTALS </h1>
       		<a href="index.php"><i class="fas fa-home"></i>Home</a>
    		<a href="CarRead.php"><i class="fas fa-car"></i>Cars</a>
			<a href="RentalRead.php"><i class="fas fa-key"></i>Rental</a>
			<a href="ClientRead.php"><i class="fas fa-user"></i>Client</a>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
   
    </body>
</html>
EOT;
}
?>