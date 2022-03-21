<?php  
Class User{

    private PDO $db;
    private string $table = '`user`';
    private string $username;
    private string $email;
    private string $password;
    private string $token;
    private string $creationDate;
    private int $id;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;port=3307;dbname=projet_titre_pro;charset=utf8mb4', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    //Créé un nouvel utilisateur
    public function registerNewUser(): bool{
        $query = 'INSERT INTO ' . $this->table
                . ' (`username`, `email`, `password`, `creation_date`) VALUES (:username, :email, :password, :creationDate)';
        $querystatement = $this->db->prepare($query);
        $querystatement->bindValue(':username', $this->username, PDO::PARAM_STR);
        $querystatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $querystatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $querystatement->bindValue(':creationDate', $this->creationDate, PDO::PARAM_STR);
        return $querystatement->execute();
    }

    //Vérifie l'existence d'un utilisateur par le pseudo ou l'email
    public function checkIfUserExists():bool{
        $query = 'SELECT COUNT(1) FROM ' . $this->table
                . ' WHERE `email` = :email OR `username` = :username';
        $querystatement = $this->db->prepare($query);
        $querystatement->bindValue(':username', $this->username, PDO::PARAM_STR);
        $querystatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $querystatement->execute();
        return $querystatement->fetchColumn();
    }

    //Appelle getUserInfo //Change en fonction du type de login
    public function getUserByLogin($login): object{
        $queryPart = $login == 'email' ? '`email` = :email' : '`username` = :username';
        $placeholder = $login == 'email' ? ':email' : ':username';
        $attribute = $login == 'email' ? 'email' : 'username';
        return $this->getUserInfo($queryPart, $placeholder, $attribute);
    }
    public function getUserInfo($queryPart, $placeholder, $attribute): object
    {
        $query = 'SELECT `password`, `id`, `username`, `email`, `profile_pic_link` AS `profilePic`, `role` FROM ' . $this->table
            . ' WHERE ' . $queryPart;
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue($placeholder, $this->{$attribute}, PDO::PARAM_STR);
        $queryStatement->execute();
        return $queryStatement->fetch(PDO::FETCH_OBJ);
    }

    //Retourne l'id de la dernière colomne insérée
    public function lastInsertId(){
        $queryStatement = $this->db->query('SELECT LAST_INSERT_ID() FROM ' . $this->table);
        $queryStatement->execute();
        return intval($queryStatement->fetchColumn());
    }

    //Retourne la date de création du compte
    public function getCreationDate()
    {
        $query = 'SELECT DATE_FORMAT(`creation_date`, \'%d/%m/%Y\') AS `creationDate` FROM ' . $this->table
            . ' WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->execute();
        return $queryStatement->fetchColumn();
    }

    //Modifie le nom d'utilisateur
    public function updateUsername():bool
    {
        $query = 'UPDATE' . $this->table
                . 'SET `username` = :username'
                . ' WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->bindValue(':username', $this->username, PDO::PARAM_STR);
        return $queryStatement->execute();
    }
    //Modifie l'adresse email
    public function updateEmail():bool
    {
        $query = 'UPDATE' . $this->table
                . 'SET `email` = :email'
                . ' WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $queryStatement->execute();
    }



    //SETTERS
    public function setId(int $id):void{ 
        $this->id = $id;
    }
    public function setUsername(string $username):void{
        $this->username = $username;
    }
    public function setEmail(string $email):void{
        $this->email = $email;
    }
    public function setPassword(string $password):void{
        $this->password = $password;
    }
    public function setToken(string $token):void{
        $this->token = $token;
    }
    public function setCreationDate(string $creationDate){
        $this->creationDate = $creationDate;
    }
    //GETTERS
    public function getId():int{
        return $this->id;
    }
    public function getUsername():string{
        return $this->username;
    }
    public function getEmail():string{
        return $this->email;
    }
    public function getToken():string{
        return $this->token;
    }
}