<?php
// Database configuration
$servername = "127.0.0.1";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "extensionsn"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission to add new extension
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $ext_number = $_POST["ext_number"];
    $pabx_port = $_POST["pabx_port"];
    $cable_location_a = $_POST["cable_location_a"];
    $cable_location_b = $_POST["cable_location_b"];
    $user_name = $_POST["user_name"];

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO extensionsn (ext_number, pabx_port, cable_location_a, cable_location_b, user_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $ext_number, $pabx_port, $cable_location_a, $cable_location_b, $user_name);

    if ($stmt->execute()) {
        echo "<script>alert('New extension added successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetching existing extension details
$sql = "SELECT * FROM extensionsn";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Extension Number System</title>
    <style>
    body {
        font-family: 'Lato', sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #e0e7ff; /* Softer blue background */
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th {
        background-color: #4a90e2; /* Lighter blue for headers */
        color: white;
    }
    td {
        padding: 8px;
        text-align: center;
    }
    input, button {
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        width: calc(100% - 22px);
        font-family: 'Lato', sans-serif;
    }
    button {
        background-color: #4a90e2;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #3b7bbf; /* Darker hover */
    }
</style>

</head>
<body>

<div class="container">
    <h2>Extension Number Management</h2>

    <form method="POST">
        <h3>Add New Extension</h3>
        <label for="ext_number">Extension Number:</label>
        <input type="text" id="ext_number" name="ext_number" required>
        <label for="pabx_port">PABX Port:</label>
        <input type="text" id="pabx_port" name="pabx_port" required>
        <label for="cable_location_a">Cable Location A:</label>
        <input type="text" id="cable_location_a" name="cable_location_a" required>
        <label for="cable_location_b">Cable Location B:</label>
        <input type="text" id="cable_location_b" name="cable_location_b" required>
        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" required>
        <button type="submit" name="add">Save</button>
    </form>

    <h3>Extension Number Details</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Ext Number</th>
            <th>PABX Port</th>
            <th>Cable Location A</th>
            <th>Cable Location B</th>
            <th>User Name</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['ext_number']}</td>
                        <td>{$row['pabx_port']}</td>
                        <td>{$row['cable_location_a']}</td>
                        <td>{$row['cable_location_b']}</td>
                        <td>{$row['user_name']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No extensions found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
