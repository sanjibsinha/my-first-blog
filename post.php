<?php
include 'db.php';

// Get the post ID from the URL
$id = $_GET['id'];

// Fetch the post by ID
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Simple Blog</h1>
        <a href="index.php">Back to Home</a>
    </header>

    <main>
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        <p><small>Posted on <?php echo $post['created_at']; ?></small></p>
    </main>
</body>
</html>

<?php
$conn->close();
?>