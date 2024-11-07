<?php
namespace App\Models;

use App\Models\BaseModel;

class Author extends BaseModel {
    public static function all() {
        global $db;
        $sql = "SELECT * FROM authors";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();
    }
}
