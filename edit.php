<?php
require 'config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    header("Location: index.php");
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title     = trim($_POST['title']);
    $author    = trim($_POST['author']);
    $genre     = trim($_POST['genre']);
    $year      = trim($_POST['year']);
    $available = isset($_POST['available']) ? 1 : 0;

    if (empty($title))  $errors[] = "Title is required.";
    if (empty($author)) $errors[] = "Author is required.";
    if ($year && (!is_numeric($year) || $year < 1000 || $year > 2100)) {
        $errors[] = "Please enter a valid year.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE books SET title=?, author=?, genre=?, year=?, available=? WHERE id=?");
        $stmt->execute([$title, $author, $genre, $year ?: null, $available, $id]);
        header("Location: index.php?msg=Book updated successfully");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Book</h1>
        <a href="index.php" class="back">&larr; Back</a>

        <?php foreach ($errors as $e): ?>
            <p class="error"><?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>

        <form method="POST">
            <label>Title *</label>
            <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? $book['title']) ?>">

            <label>Author *</label>
            <input type="text" name="author" value="<?= htmlspecialchars($_POST['author'] ?? $book['author']) ?>">

            <label>Genre</label>
            <input type="text" name="genre" value="<?= htmlspecialchars($_POST['genre'] ?? $book['genre']) ?>">

            <label>Year</label>
            <input type="number" name="year" value="<?= htmlspecialchars($_POST['year'] ?? $book['year']) ?>">

            <label>
                <input type="checkbox" name="available" <?= ($book['available'] ? 'checked' : '') ?>> Available
            </label>

            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>
</body>
</html>
