<?php
namespace App\Models;

use App\Models\BaseModel;

class Genre extends BaseModel {
    protected function allGenres() {
        global $db;
        $sql = "SELECT * 
        FROM genres";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        $db_items = $pdo_statement->fetchAll();
        return self::castToModel($db_items);
    }
}