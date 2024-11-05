<h1 class="text-3xl font-bold mb-4">Catalog</h1>
<form method="GET" class="mb-4">
    <label class="block">
        <p class="text-lg mb-2">Search</p>
        <input type="text" name="search" placeholder="Search here" value="<?= $search; ?>" class="w-full p-2 border border-gray-300 rounded">
    </label>
</form>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($books as $book) : ?>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold mb-2 text-red-500"><?= $book->title; ?></h2>
            <p class="text-gray-600 mb-2">Published Date: <?= $book->published_date; ?></p>
            <p class="text-gray-600 mb-2">Author: <?= $book->author; ?></p>
            <div class="flex justify-between ">
                <a href="catalog/edit/<?= $book->id; ?>" class="text-blue-500 hover:underline">Edit</a>
                <a href="catalog/delete/<?= $book->id; ?>" class="text-red-500 hover:underline">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>