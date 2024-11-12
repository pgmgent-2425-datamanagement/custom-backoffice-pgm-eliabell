<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
</head>
<body>
    <h1>Add New Book</h1>
    <form action="/catalog/save" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author_id">Author:</label>
        <select id="author_id" name="author_id" required>
            <?php foreach ($authors as $author): ?>
                <option value="<?= $author->id; ?>"><?= $author->first_name . ' ' . $author->last_name; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="published_date">Published Date:</label>
        <input type="date" id="published_date" name="published_date" required><br><br>

        <label for="genre_id">Genre:</label>
        <select id="genre_id" name="genre_id" required>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre->id; ?>"><?= $genre->names; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="imgpath">Cover Image:</label>
        <input type="file" id="imgpath" name="imgpath" accept="image/*"><br><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>