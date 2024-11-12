<h1 class="heading-1">Catalog</h1>
<form method="GET" class="form-spacing">
    <label class="label-block">
        <p class="label-text">Search</p>
        <input type="text" name="search" placeholder="Search here" value="<?= $search; ?>" class="input-field">
    </label>
    <label class="label-block">
        <p class="label-text">Genre</p>
        <select name="genre_id" class="input-field">
            <option value="">All Genres</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre->id; ?>" <?= $genre->id == $selected_genre ? 'selected' : ''; ?>><?= $genre->names; ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <input type="submit" value="Filter" class="btn btn-primary">
</form>
<div class="grid-container grid-container-1-col grid-container-2-col grid-container-3-col">
    <?php foreach ($books as $book) : ?>
        <div class="card">
            <h2 class="heading-2"><?= $book->title; ?></h2>
            <img src="/images/<?= $book->imgpath; ?>.png" alt="<?= $book->title; ?>" class="img-fluid">
            <p class="text-muted">Published Date: <?= $book->published_date; ?></p>
            <p class="text-muted">Author: <?= $book->first_name . ' ' . $book->last_name; ?></p>
            <div class="flex-container">
                <a href="/catalog/edit/<?= $book->id; ?>" class="text-blue">Edit</a>
                <a href="/catalog/delete/<?= $book->id; ?>" class="text-red">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>