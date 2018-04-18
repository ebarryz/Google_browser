<?php

// -------------------------------------- OPEN DATABASE CONNECTION ---------------------------------------
// Database access data (individual for each person)
// $servername = "localhost";
// $username = "root";
// $password = "mysql";
// $dbname = "crawler";
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "Crawler";

if(!empty($_GET['search'])){
    $searchTerm = $_GET['search'];
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ---------------------------------------------- FUNCTIONS ----------------------------------------------
function getResults($conn, $searchTerm) {
    $sql = "SELECT * FROM sitesviewed WHERE content LIKE '%$searchTerm%'";
    var_dump($sql);

	$result = $conn -> query($sql);
	var_dump($result);
		if ($result-> num_rows > 0) {
			echo('NUMBER OF RECORDS: '.$result -> num_rows);
			$myArray = [];

		    // output data of each row
		    while($row = $result->fetch_assoc()) {
	            $myArray[] = $row;
		    }
		    echo json_encode($myArray);
		} else {
		    echo "0 results";
		}
}

if(isset($searchTerm)) {
	getResults($conn, $searchTerm);
}

// -------------------------------------- CLOSE DATABASE CONNECTION --------------------------------------
// Close connection with database
$conn->close();

?>