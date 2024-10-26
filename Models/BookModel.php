<?php

use App\Models\BaseModel;

class Book extends BaseModel
{
    // Haal alle boeken op, inclusief geassocieerde data (zoals auteur of uitgever) en optionele zoekfunctionaliteit
    public static function allBooks($search = '')
    {
        global $db;
        
        // SQL-query met een zoekterm om te filteren op titel, genre of auteur
        // Make sure the column names match your database schema
        $sql = 'SELECT books.*, authors.first_name, authors.last_name, genres.genre_name AS genre_name, publishers.name AS publisher_name 
                FROM books 
                INNER JOIN authors ON books.author_id = authors.id
                INNER JOIN genres ON books.genre_id = genres.id
                INNER JOIN publishers ON books.publisher_id = publishers.id
                WHERE books.title LIKE :search OR authors.first_name LIKE :search OR authors.last_name LIKE :search OR genres.genre_name LIKE :search OR publishers.name LIKE :search';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(['search' => '%' . $search . '%']);

        $db_items = $pdo_statement->fetchAll();

        // Converteer de opgehaalde databasegegevens naar een boekmodel
        return (new self())->castToModel($db_items); // Use instance method instead of static call
    }

    // Methode om een nieuw boek op te slaan in de database
    public function save()
    {
        $sql = "INSERT INTO books (title, author_id, genre_id, publisher_id, publication_year) 
                VALUES (:title, :author_id, :genre_id, :publisher_id, :publication_year)";
        
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':title' => $this->title,
            ':author_id' => $this->author_id,
            ':genre_id' => $this->genre_id,
            ':publisher_id' => $this->publisher_id,
            ':publication_year' => $this->publication_year,
        ]);

        return $success;
    }

    // Methode om een bestaand boek te bewerken
    public function edit($id)
    {
        $sql = "UPDATE books SET title = :title, author_id = :author_id, genre_id = :genre_id, publisher_id = :publisher_id, publication_year = :publication_year WHERE id = :id";
        
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':title' => $this->title,
            ':author_id' => $this->author_id,
            ':genre_id' => $this->genre_id,
            ':publisher_id' => $this->publisher_id,
            ':publication_year' => $this->publication_year,
            ':id' => $id
        ]);

        return $success;
    }
}
