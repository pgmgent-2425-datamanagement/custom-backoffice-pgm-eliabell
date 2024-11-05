<h1 class="heading-1">Catalog</h1>
<form method="GET" class="form-spacing">
    <label class="label-block">
        <p class="label-text">Search</p>
        <input type="text" name="search" placeholder="Search here" value="<?= $search; ?>" class="input-field">
    </label>
</form>
<div class="grid-container grid-container-1-col grid-container-2-col grid-container-3-col">
    <?php foreach ($books as $book) : ?>
        <div class="card">
            <h2 class="heading-2"><?= $book->title; ?></h2>
            <p class="text-muted">Published Date: <?= $book->published_date; ?></p>
            <p class="text-muted">Author: <?= $book->first_name . ' ' . $book->last_name; ?></p>
            <div class="flex-container">
                <a href="catalog/edit/<?= $book->id; ?>" class="text-blue">Edit</a>
                <a href="catalog/delete/<?= $book->id; ?>" class="text-red">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
