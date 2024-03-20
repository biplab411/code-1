<?php
// Retrieve and display entries from MySQL table
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM submitted_entries";
$result = $conn->query($sql);

echo "<table>";
echo "<tr><th>Username</th><th>Code Language</th><th>Stdin</th><th>Timestamp</th><th>Source Code (First 100 characters)</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["code_language"]."</td><td>".$row["stdin"]."</td><td>".$row["timestamp"]."</td><td>".$row["source_code"]."</td></tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";

$conn->close();
?>
