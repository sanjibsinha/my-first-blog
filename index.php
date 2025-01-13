<?php
include 'db.php';

// Fetch all posts from the database
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome to My Blog</h1>
        <a href="create_post.php">Create a New Post</a>
    </header>

    <main>
        <h2>Latest Posts</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h3><a href='post.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</a></h3>";
                echo "<p>" . substr(htmlspecialchars($row['content']), 0, 200) . "...</p>";
                echo "<p><small>Posted on " . $row['created_at'] . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No posts found.</p>";
        }
        ?>
    </main>
</body>
</html>

<?php
$conn->close();
?>