<?php 
class Album 
{

private PDO $db;
private string $table = '`album`';
private int $id;
private string $title;
private string $releaseDate;
private string $shortDesc;
private string $longDesc;
private string $coverLink;




public function __construct()
{
    try {
        $this->db = new PDO('mysql:host=localhost;port=3307;dbname=projet_titre_pro;charset=utf8mb4', 'root');
    } catch (Exception $error) {
        die($error->getMessage());
    }
}

public function getAllForDisplay(): array{
    $query = 'SELECT `title`, `cover_link` AS `cover`, band.name AS bandName'
    . ' FROM ' . $this->table
    . ' JOIN `credited_band` ON `album`.`id` = `credited_band`.`id_album` '
    . ' JOIN `band` ON `credited_band`.`id_band` = `band`.`id`';
    $queryStatement = $this->db->query($query); 
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}







}