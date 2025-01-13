<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert the new post into the database
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to home page after success
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>New Blog Post</h1>
        <a href="index.php">Back to Home</a>
    </header>

    <main>
        <form action="create_post.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required></textarea>
            <button type="submit">Publish Post</button>
        </form>
    </main>
</body>
</html>

<?php
$conn->close();
?>