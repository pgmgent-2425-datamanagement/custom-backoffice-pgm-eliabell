<h1>Books Catalog</h1>
<form method="GET">
    <label>
        <p>Search</p>
        <input type="text" name="search" placeholder="Search here" value="<?= $search; ?>">
    </label>
</form>
<?php foreach ($books as $book) : ?>
    <article>
        <h2><?= $book->title; ?></h2>
        <p>Published Date: <?= $book->published_date; ?></p>
        <a href="catalog/edit/<?= $book->id; ?>">Edit</a>
        <a href="catalog/delete/<?= $book->id; ?>">Delete</a>
    </article>
<?php endforeach; ?>