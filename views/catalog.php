<h1>Catalog</h1>

<form method="GET">
<label>
    <p>search</p>
<input type="text" name="search" placeholder="search here" value="<?= $search; ?>">
</label>
</form>

<?php foreach ($books as $book) : ?>
    <article>
        <p>hi</p>
        <h2><?= $book->title; ?></h2>
        <p><?= $book->datum; ?></p>
        <p><?= $book->author; ?></p>
        <a href="catalog/edit/<?= $book->id; ?>">edit</a>
        <a href="catalog/delete/<?= $book->id; ?>">delete</a>
    </article>