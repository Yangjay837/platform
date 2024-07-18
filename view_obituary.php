
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orbituary_platform";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM obituaries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    
    th {
        background-color: #f0f0f0;
    }
    </style>";
    
    echo "<table>";
    echo "<tr><th>Name</th><th>Date of Birth</th><th>Date of Death</th><th>Content</th><th>Author</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date_of_birth"] . "</td>";
        echo "<td>" . $row["date_of_death"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td>" . $row["author"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No obituaries found";
}

$conn->close();
?>