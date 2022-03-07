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
    $query = 'SELECT ' . $this->table . '.`id`, `title`, `cover_link` AS `cover`, band.name AS bandName'
    . ' FROM ' . $this->table
    . ' JOIN `credited_band` ON `album`.`id` = `credited_band`.`id_album` '
    . ' JOIN `band` ON `credited_band`.`id_band` = `band`.`id`';
    $queryStatement = $this->db->query($query); 
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}
public function getAlbum(): object{
    $query = 'SELECT `title`, `cover_link` AS `cover`, band.name AS bandName, `long_desc` AS `desc`, DATE_FORMAT(`releaseDate`, \'%d/%m/%Y\') AS `releaseDate`'
    .', `label`'
    . ' FROM ' . $this->table
    . ' JOIN `credited_band` ON `album`.`id` = `credited_band`.`id_album` '
    . ' JOIN `band` ON `credited_band`.`id_band` = `band`.`id`'
    . ' WHERE `album`.`id` = :albumId';
    $queryStatement = $this->db->prepare($query); 
    $queryStatement->bindValue(':albumId', $this->id, PDO::PARAM_INT);
    $queryStatement->execute();
    return $queryStatement->fetch(PDO::FETCH_OBJ);
}
public function getAlbumTracks(): array{
    $query = 'SELECT `album_track`.`title` AS `trackTitle`, `duration`, `track_order` AS `trackOrder`'
    . ' FROM ' . $this->table
    . ' JOIN `album_track` ON `album`.`id` = `album_track`.`id_album` '
    . ' WHERE `album`.`id` = :albumId';
    $queryStatement = $this->db->prepare($query); 
    $queryStatement->bindValue(':albumId', $this->id, PDO::PARAM_INT);
    $queryStatement->execute();
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}
public function getCreditedMusicians(): array{
    $query = 'SELECT `musician`.`name` AS `musicianName`, `credited_musician`.`instrument` AS `instrument`'
    . ' FROM ' . $this->table
    . ' JOIN `credited_musician` ON `album`.`id` = `credited_musician`.`id_album`'
    . ' JOIN `musician` ON `credited_musician`.`id_musician` = `musician`.`id`'
    . ' WHERE `album`.`id` = :albumId';
    $queryStatement = $this->db->prepare($query); 
    $queryStatement->bindValue(':albumId', $this->id, PDO::PARAM_INT);
    $queryStatement->execute();
    return $queryStatement->fetchAll(PDO::FETCH_OBJ);
}






public function setId($id){
    $this->id = $id;
}





}