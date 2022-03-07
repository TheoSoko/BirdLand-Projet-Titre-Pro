<?php 
class Band 
{

private PDO $db;
private int $id;
private string $table = '`band`';



public function __construct()
{
    try {
        $this->db = new PDO('mysql:host=localhost;port=3307;dbname=projet_titre_pro;charset=utf8mb4', 'root');
    } catch (Exception $error) {
        die($error->getMessage());
    }
}

public function getAllForDisplay(): array{
    $query = 'SELECT ' . $this->table . '.`id`, `name`, `main_image_link` AS `mainImage`, `presentation`'
    . ' FROM ' . $this->table;
    $queryStatement = $this->db->query($query); 
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}

}