<form method="POST">
    <h1>Edit book</h1>
    <label for="title">book Name:</label>
    <input type="text" name="title" value="<?= $book->title; ?>" required><br><br>

    <label for="published_date">Published Date:</label>
    <input type="date" name="published_date" value="<?= $book->published_date; ?>" required><br><br>
   


    <input type="hidden" name="id" value="<?= $book->id; ?>">
    
    <input type="submit" value="Update book">
</form>