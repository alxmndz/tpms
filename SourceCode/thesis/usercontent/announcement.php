<?php
$conn = new mysqli("localhost", "root", "", "thesis");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['announceTitle'];
        $description = $row['announceDesc'];
        $date = $row['announceDate'];
        
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $title . '</h5>';
        echo '<p class="card-text">' . $description . '</p>';
        echo '<p class="card-text"><small class="text-muted">' . $date . '</small></p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No announcements found.";
}

$conn->close();
?>
