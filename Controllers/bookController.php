<?php

namespace App\Controllers;

use App\Models\Book;

class BookController extends BaseController {

    public static function catalog () {

        $search = $_GET['search'] ?? '';
        $books = Book::allBooks($search);
        self::loadView('/catalog', [
            'title' => 'Boekencatalogus',
            'books' => $books,
            'search' => $search
        ]);
    }
    // Verwijder een boek
    public static function delete ($id) {
        Book::deleteById($id);
        self::redirect('/catalog');
    }

    // Detailweergave van een specifiek boek
    public static function detail ($id) {
        $book = Book::find($id);
        
        // Laad de view en geef het boek door
        self::loadView('/book', [
            'book' => $book
        ]);
    }

    // Laad de pagina voor het toevoegen van een nieuw boek
    public static function add () {
        self::loadView('/form');
    }

    // Sla een nieuw boek op
    public static function save () {
        $book = new Book();
        $book->title = $_POST['title'];
        $book->author_id = $_POST['author_id'];
        $book->genre_id = $_POST['genre_id'];
        $book->publisher_id = $_POST['publisher_id'];
        $book->publication_year = $_POST['publication_year'];
        $success = $book->save();

        if ($success) {
            self::redirect('/books');
        } else {
            echo 'Er is iets misgegaan bij het opslaan van het boek';
        }
    }

    // Laad de pagina voor het bewerken van een bestaand boek
    public static function edit ($id) {
        $book = Book::find($id);
        self::loadView('/edit', [
            'book' => $book
        ]);
    }

    // Update een bestaand boek
    public static function update ($id) {
        $book = Book::find($id);
        $book->title = $_POST['title'];
        $book->author_id = $_POST['author_id'];
        $book->genre_id = $_POST['genre_id'];
        $book->publisher_id = $_POST['publisher_id'];
        $book->publication_year = $_POST['publication_year'];
        $success = $book->update($id);

        if ($success) {
            self::redirect('/books');
        } else {
            echo 'Er is iets misgegaan bij het updaten van het boek';
        }
    }
}