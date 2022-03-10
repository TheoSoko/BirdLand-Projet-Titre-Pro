<?php 
class Band 
{

private PDO $db;
private int $id;
private string $table = '`band`';
private string $name;



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

public function getBand(): object{
    $query = 'SELECT ' . $this->table . '.`id`, `main_image_link` AS `mainImage`, `band`.`name` AS `bandName`, `presentation`'
    . ' FROM ' . $this->table
    . ' WHERE `band`.`id` = :bandId';
    $queryStatement = $this->db->prepare($query); 
    $queryStatement->bindValue(':bandId', $this->id, PDO::PARAM_INT);
    $queryStatement->execute();
    return $queryStatement->fetch(PDO::FETCH_OBJ);
}

public function getIdFromName(){
    $query = 'SELECT `id`'
            . ' FROM ' . $this->table 
            . ' WHERE `name` = :name' ;
    $queryStatement = $this->db->prepare($query);
    $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
    $queryStatement->execute();
    return $queryStatement->fetchColumn();
}


public function setId($id){
    $this->id = $id;
}
public function setName($name){
    $this->name = $name;
}

}