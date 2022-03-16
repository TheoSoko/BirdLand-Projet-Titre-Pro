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
    public function getPassword():string{
        return $this->password;
    }
    public function getToken():string{
        return $this->token;
    }
}