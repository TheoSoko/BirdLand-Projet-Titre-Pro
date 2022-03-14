<?php 
class Tracks
{
    
private PDO $db;
private string $table = '`album_track`';
private int $idAlbum;
private string $title;
private string $duration;
private string $trackOrder;



public function __construct()
{
    try {
        $this->db = new PDO('mysql:host=localhost;port=3307;dbname=projet_titre_pro;charset=utf8mb4', 'root');
    } catch (Exception $error) {
        die($error->getMessage());
    }
}


//Ajoute des pistes à un album
public function addTracks(): bool{
    $query = 'INSERT INTO ' . $this->table . '(`title`, `duration`, `track_order`, `id_album`)'
    . ' VALUES (:title, :duration, :track_order, :id_album)' ;
    $queryStatement = $this->db->prepare($query);
    $queryStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
    $queryStatement->bindValue(':duration', $this->duration, PDO::PARAM_STR);
    $queryStatement->bindValue(':track_order', $this->trackOrder, PDO::PARAM_STR);
    $queryStatement->bindValue(':id_album', $this->idAlbum, PDO::PARAM_INT);
    
    return $queryStatement->execute(); 
}



public function setIdAlbum($idAlbum){
    $this->idAlbum = $idAlbum;
}
public function setTitle($title){
    $this->title = $title;
}
public function setDuration($duration){
    $this->duration = $duration;
}
public function setTrackOrder($trackOrder){
    $this->trackOrder = $trackOrder;
}

}