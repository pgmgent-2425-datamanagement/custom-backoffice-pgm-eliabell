<?php
namespace App\Models;

use App\Models\BaseModel;

class Book extends BaseModel
{
    protected function allBooks($search = '')
    {
        global $db;
        $sql = "SELECT * 
FROM books 
LEFT JOIN authors 
-- INNER JOIN authors
    ON books.author_id = authors.id  
    WHERE title LIKE :search
    OR first_name LIKE :search
    OR last_name LIKE :search
    ";

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([':search' => '%' . $search . '%']);
        $db_items = $pdo_statement->fetchAll();

        return self::castToModel($db_items);
    }

    public function save()
    {
        $sql = "INSERT INTO books (title, published_date, id, imgpath) VALUES (:title, :published_date, :id, :imgpath)"; 

        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ":title" => $this->title,
            ":published_date" => $this->published_date,
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
