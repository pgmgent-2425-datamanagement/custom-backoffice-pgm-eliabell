<?php
namespace App\Models;

use App\Models\BaseModel;

class Author extends BaseModel {
    protected static function all() {
        global $db;
        $sql = "SELECT * 
        FROM authors";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        $db_items = $pdo_statement->fetchAll();

        return self::castToModel($db_items);
    }








}
