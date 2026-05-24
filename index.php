<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Library Manager</h1>
        <a href="add.php" class="btn">+ Add Book</a>

        <?php if (isset($_GET['msg'])): ?>
            <p class="success"><?= htmlspecialchars($_GET['msg']) ?></p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM books ORDER BY title ASC");
                while ($book = $stmt->fetch(PDO::FETCH_ASSOC)):
                ?>
                <tr>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['author']) ?></td>
                    <td><?= htmlspecialchars($book['genre']) ?></td>
                    <td><?= htmlspecialchars($book['year']) ?></td>
                    <td><?= $book['available'] ? 'Yes' : 'No' ?></td>
                    <td>
                        <a href="edit.php?id=<?= $book['id'] ?>">Edit</a> |
                        <a href="delete.php?id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
