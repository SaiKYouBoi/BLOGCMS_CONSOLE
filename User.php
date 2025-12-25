<?php

$user_id = null;
$user_role = null;

abstract class User{
    protected int $id;
    protected string $username;
    protected string $email;
    protected string $passwordHash;
    protected DateTime $createdAt;
    private ?DateTime $lastLogin = null;

    public function __construct(
        int $id,
        string $username,
        string $email,
        string $passwordHash,
        DateTime $createdAt,
        ?DateTime $lastLogin = null,
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->createdAt = new DateTime();
        $this->lastLogin;
    }
    
    abstract public function getRole():string;

    public function getUserInfo():array{

        return [
            'id' => $this->id,
            'username' => $this->username,
            'role' => $this->getRole(),
            'email' => $this->email,
            'createdAt' => $this->createdAt
        ];
    }

    public static function emailExists(array $users,string $email){
        foreach($users as $user){
            if($user->getUserInfo()['email'] === $email){
                return true;
            }
        }
        return false;
    }

    public static function usernameExists(array $users,string $username){
        foreach($users as $user){
           if($user->getUserInfo()['username'] === $username  ){
            return true;
           } 
        }
        return false;
    }

    public function verifyPass($plainPass): bool{
        return password_verify($plainPass, $this->passwordHash);
    }

    public static function login($users,$email,$pass){
        global $user_id, $user_role;
        foreach($users as $user){
            if($user->getUserInfo()['email']===$email){
                if($user->verifyPass($pass)){
                    $user_id = $user->getUserInfo()['id'];
                    $user_role = $user->getUserInfo()['role'];

                    return true;
                }
                return null;
            }
        }
        return null;
    }

    public function setUserName(string $username){
        $this->username = $username;
    }
     public function setUserEmail(string $email){
        $this->email = $email;
    }


}