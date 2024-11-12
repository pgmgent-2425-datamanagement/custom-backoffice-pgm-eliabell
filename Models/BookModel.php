<?php
namespace App\Models;

use App\Models\BaseModel;

class Book extends BaseModel
{
    public $id;
    public $title;
    public $author_id;
    public $genre_id;
    public $published_date;
    public $imgpath;

    protected function allBooks($search = '')
    {
        global $db;
        $sql = "SELECT books.*, authors.*, genres.names AS genre_name
FROM books
LEFT JOIN authors ON books.author_id = authors.id
LEFT JOIN genres ON books.genre_id = genres.id
WHERE books.title LIKE :search
OR authors.first_name LIKE :search
OR authors.last_name LIKE :search
OR genres.names LIKE :search;



    ";

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([':search' => '%' . $search . '%']);
        $db_items = $pdo_statement->fetchAll();

        return self::castToModel($db_items);
    }

    public function save()
    {
        $sql = "INSERT INTO books (title, published_date, id, imgpath, author_id, genre_id) VALUES (:title, :published_date, :id, :imgpath, :author_id, :genre_id)"; 

        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ":title" => $this->title,
            ":published_date" => $this->published_date,
            ":author_id" => $this->author_id,
            ":genre_id" => $this->genre_id,
            ":id" => $this->id,
            ":imgpath" => $this->imgpath
        ]);
        return $success;
    }

    public function update()
    {
        $sql = "UPDATE books SET title = :title, published_date = :published_date WHERE id = :id";
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ":title" => $this->title,
            ":published_date" => $this->published_date,
            ":id" =>$this->id
        ]);
        return $success;
    }
}
