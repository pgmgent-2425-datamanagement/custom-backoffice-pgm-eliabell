<form method="post">
    <h1>Edit book</h1>
    <label for="title">book Name:</label>
    <input type="text" name="title" value="<?= $book->title; ?>" required><br><br>

    <label for="datum">book Date:</label>
    <input type="date" name="datum" value="<?= $book->datum; ?>" required><br><br>

    <label for="location">book Location:</label>
    <input type="text" name="location" value="<?= $book->location; ?>" required><br><br>

    <input type="submit" value="Update book">
</form>