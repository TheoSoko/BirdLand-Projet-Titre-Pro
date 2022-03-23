<?php 
class Band 
{

private PDO $db;
private int $id;
private string $table = '`band`';
private string $name;
private int $userId;



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

public function getIdFromName():int{
    $query = 'SELECT `id`'
            . ' FROM ' . $this->table 
            . ' WHERE `name` = :name' ;
    $queryStatement = $this->db->prepare($query);
    $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
    $queryStatement->execute();
    return $queryStatement->fetchColumn();
}

public function getBandsByUser(): array{
    $query = 'SELECT `band`.`name` AS `bandName`, `band`.`main_image_link` AS `bandImg`, `band`.`id` AS `bandId`'
    . ' FROM ' . $this->table
    . ' JOIN `user_has_band` ON `user_has_band`.`id` = ' . $this->table . '.`id`'
    . ' JOIN `user` ON `user_has_band`.`id_user` = `user`.`id`'
    . ' WHERE `user`.`id` = :userId';
    $queryStatement = $this->db->prepare($query); 
    $queryStatement->bindValue(':userId', $this->userId,  PDO::PARAM_INT);
    $queryStatement->execute(); 
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}
public function getBandAlbums(){
    $query = 'SELECT `album`.`title` AS `albumTitle`, `album`.`id` AS `albumId`, `album`.`artist` AS `albumArtist`,'
    . ' `album`.`cover_link` AS `albumCover` '
    . ' FROM ' . $this->table
    . ' JOIN `credited_band` ON `credited_band`.`id_band` = ' . $this->table . '.`id`'
    . ' JOIN `album` ON `credited_band`.`id_album` = `album`.`id`'
    . ' WHERE ' . $this->table . '.`id` = :bandId';
    $queryStatement = $this->db->prepare($query); 
    $queryStatement->bindValue(':bandId', $this->id, PDO::PARAM_INT);
    $queryStatement->execute(); 
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}

public function setId(int $id){
    $this->id = $id;
}
public function setName(string $name){
    $this->name = $name;
}
public function setUserId(int $userId){
    $this->userId = $userId;
}

}