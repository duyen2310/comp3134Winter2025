GNU nano 6.2                                                                          getusers_1.php                                                                                   
<?php
// Connect to the database
$host = "localhost";
$dbname = "my_app_db";
$username = "root";  // change if needed
$password = "Duyen151064!";      // change if needed

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture input
$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Get Users</title>
</head>
<body>
    <h2>Search Users</h2>
    <form method="get" action="getusers_1.php">
        <label>First Name: </label>
        <input type="text" name="firstname" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if ($firstname !== '') {
        $sql = "SELECT * FROM users WHERE firstname = '$firstname' AND active = 1";
        $result = $conn->query($sql);

        echo "<h3>Results:</h3>";
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Active</th>
                    </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['lastname']}</td>
                                <td>{$row['active']}</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results found.";
                }
            }
        
            $conn->close();
            ?>
        </body>
        </html>
        