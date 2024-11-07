<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Author;

class BookController extends BaseController {

    // Display the catalog of books
    public static function catalog() {
        $search = $_GET['search'] ?? '';
        $books = Book::allBooks($search);
        self::loadView('/catalog', [
            'title' => 'Boekencatalogus',
            'books' => $books,
            'search' => $search
        ]);
    }

    // Delete a book
    public static function delete($id) {
        Book::deleteById($id);
        self::redirect('/catalog');
    }

    // Display details of a specific book
    public static function detail($id) {
        $book = Book::find($id);
        self::loadView('/book', [
            'book' => $book
        ]);
    }

    // Load the form for adding a new book
    public static function add() {
        $authors = Author::all(); // Fetch all authors for the dropdown
        self::loadView('/form', [
            'authors' => $authors
        ]);
    }

    // Save a new book
    public static function save() {
        $book = new Book();
        $book->title = $_POST['title'];
        $book->author_id = $_POST['author_id'];
        $book->genre_id = $_POST['genre_id'];
        $book->publisher_id = $_POST['publisher_id'];
        $book->published_date = $_POST['published_date'];
        $success = $book->save();

        if ($success) {
            self::redirect('/catalog');
        } else {
            echo 'Er is iets misgegaan bij het opslaan van het boek';
        }
    }

    // Load the form for editing an existing book
    public static function edit($id) {
        $book = Book::find($id);
        // $authors = Author::find($id); // Fetch all authors for the dropdown
        self::loadView('/edit', [
            'book' => $book,
            // 'authors' => $authors
        ]);
    }

    // Update an existing book
    public static function update($id) {
        $book = Book::find($id);
        $book->title = $_POST['title'];
        $book->published_date = $_POST['published_date'];

        $success = $book->update();
        if ($success) {
            self::redirect('/catalog');
        } else {
            echo 'Er is iets misgegaan bij het updaten van het boek';
        }
    }
}
