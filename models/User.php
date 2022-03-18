<?php  
Class User{

    private PDO $db;
    private string $table = '`user`';
    private string $username;
    private string $email;
    private string $password;
    private string $token;
    private int $id;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;port=3307;dbname=projet_titre_pro;charset=utf8mb4', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }


    public function registerNewUser(): bool{
        $query = 'INSERT INTO ' . $this->table
                . ' (`username`, `email`, `password`) VALUES (:username, :email, :password)';
        $querystatement = $this->db->prepare($query);
        $querystatement->bindValue(':username', $this->username, PDO::PARAM_STR);
        $querystatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $querystatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $querystatement->execute();
    }
    public function checkIfUserExists():bool{
        $query = 'SELECT COUNT(1) FROM ' . $this->table
                . ' WHERE `email` = :email OR `username` = :username';
        $querystatement = $this->db->prepare($query);
        $querystatement->bindValue(':username', $this->username, PDO::PARAM_STR);
        $querystatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $querystatement->execute();
        return $querystatement->fetchColumn();
    }

    //Appelle getLoginInfo
    public function getPasswordHash($login): object{
        $queryPart = $login == 'email' ? '`email` = :email' : '`username` = :username';
        $placeholder = $login == 'email' ? ':email' : ':username';
        $attribute = $login == 'email' ? 'email' : 'username';
        return $this->getLoginInfo($queryPart, $placeholder, $attribute);
    }
    //Change en fonction du type de login
    public function getLoginInfo($queryPart, $placeholder, $attribute): object
    {
        $query = 'SELECT `password` FROM ' . $this->table
            . ' WHERE ' . $queryPart;
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue($placeholder, $this->{$attribute}, PDO::PARAM_STR);
        $queryStatement->execute();
        return $queryStatement->fetch(PDO::FETCH_OBJ);
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