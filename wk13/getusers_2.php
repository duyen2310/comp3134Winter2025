<?php
$conn = new mysqli("localhost", "root", "your_mysql_password", "wk13_db");

if (isset($_GET['firstname'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
    $stmt->bind_param("s", $_GET['firstname']);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<form method="GET">
    <input type="text" name="firstname">
    <input type="submit" value="Search">
</form>

<table border="1">
<tr><th>ID</th><th>Username</th><th>Email</th><thFirst Name</th><th>Last Name</th><th>Active</th></tr>
<?php
if (isset($result)) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>$col</td>";
        }
        echo "</tr>";
    }
}
?>
</table>
