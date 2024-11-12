<?php
namespace App\Controllers;

use App\Models\Book;

class HomeController extends BaseController {
    public static function index() {
        // Fetch the total number of books
        $totalBooks = Book::getTotalBooks();
        $totalAuthors = Book::getTotalAuthors();

        self::loadView('/home', [
            'title' => 'Homepage',
            'totalBooks' => $totalBooks,
            'totalAuthors' => $totalAuthors
        ]);
    }
}