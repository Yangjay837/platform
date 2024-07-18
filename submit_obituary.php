<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orbituary_platform";

$conn = new mysqli($servername, $username, $password, $dbname);


  $name = isset($_POST['name'])?trim($_POST['name']):null;
$dateOfBirth =isset( $_POST['date_of_birth'])?trim($_POST['date_of_birth']):null;
$dateOfDeath = isset($_POST['date_of_death'])?trim($_POST['date_of_death']):null;
$content =isset( $_POST['content'])?trim($_POST['content']):null;
$author =isset( $_POST['author'])?trim($_POST['author']):null;

   


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    


}


$sql = "INSERT INTO obituaries (name, date_of_birth, date_of_death, content, author)
VALUES ('$name', '$dateOfBirth', '$dateOfDeath', '$content', '$author')";
$stmt = $conn->prepare($sql);



if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}


if ($conn->query($sql) === TRUE) {
    echo "Obituary submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>