

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
    while($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $dateOfBirth = $row["date_of_birth"];
        $dateOfDeath = $row["date_of_death"];
        $content = $row["content"];
        $author = $row["author"];
        
        
        $title = "$name Obituary - $dateOfDeath";
        $description = "Read the obituary of $name, who passed away on $dateOfDeath. Share your condolences and memories with the family.";
        $keywords = "$name, obituary, $dateOfDeath, $author";
        
        
        echo "<div itemscope itemtype='http://schema.org/Obituary'>";
        echo "<h1 itemprop='name'>$name</h1>";
        echo "<p itemprop='deathDate'>$dateOfDeath</p>";
        echo "<p itemprop='description'>$content</p>";
        echo "<p itemprop='author'>$author</p>";
        echo "</div>";
        
    
        echo "<meta property='og:title' content='$title'>";
        echo "<meta property='og:description' content='$description'>";
        echo "<meta property='og:image' content='https://example.com/obituary-image.jpg'>";
        echo "<meta property='og:url' content='https://example.com/view_obituary.php?id=$row[id]'>";
        
        
        echo "<div class='social-sharing'>";
      
        echo "<a href='https://twitter.com/intent/tweet?url=https://example.com/view_obituary.php?id=$row[id]&text=$title' target='https://www.ajc.com/blog/buzz/stephen-hawking-tweeted-only-times/ORbsvKX7dnx3g0AsDOSXdM/'>Share on Twitter</a>";

       
        echo "</div>";
        
        
        
    }
} else {
    echo "No obituaries found";
}

$conn->close();
?>

