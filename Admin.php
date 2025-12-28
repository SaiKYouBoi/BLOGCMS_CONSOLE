<?php

class Admin extends User
{
    private bool $isSuperAdmin;

    public function __construct(int $id, string $username, string $email, string $passwordHash, DateTime $createdAt, ?DateTime $lastLogin, $isSuperAdmin)
    {
        parent::__construct($id, $username, $email, $passwordHash, $createdAt, $lastLogin);
        $this->isSuperAdmin = $isSuperAdmin;
    }

    public function getRole(): string
    {
        return 'admin';
    }

    public static function createUser($users,$id,$username,$email,$password,$role,$bio = ""){
        global $users;
        
        if(self::usernameExists($users,$username)){
            echo "Username already exists";
            return false;
        }
        
        if(self::emailExists($users,$email)){
            echo "Email already exists";
            return false;
        }

        $id = count($users) + 1;
        $hashedpass = password_hash($password,PASSWORD_DEFAULT);

        switch ($role) {
            case 'admin':
                $users[] = new Admin($id, $username, $email, $hashedpass, new DateTime(),null, true);
                break;
            case 'author':
                $users[] = new Author($id,$username,$email,$hashedpass, new DateTime(),null,$bio);
                break;
            case 'editor':
                $users[] = new Author($id,$username,$email,$hashedpass, new DateTime(),null,'junior');
                break;
            default:
                echo "invalid choice";
                break;
        }
    }
    public static function deleteUserbyId($users,$id){
        global $users;
        foreach($users as $index => $user){
            if($user->getUserInfo()['id']=== $id){
                unset($users[$index]);
                $users = array_values($users);
                return true;
            }
        }
        return false;
    }
    public static function modifyUserbyId($users,$id,$username,$email,$password,$role,$bio = null,$moderatelevel = null){
        global $users;
        foreach ($users as $index => $user) {
            if ($user->getUserInfo()['id'] === $id) {   
            
            $createdAt = $user->getUserInfo()['createdAt'];

            switch ($role) {
                case 'admin':
                    $users[$index] = new Admin($id,$username,$email,password_hash($password,PASSWORD_DEFAULT),$createdAt,null,true);
                    break;
                case 'author':
                    $users[$index] = new Author($id,$username,$email,password_hash($password,PASSWORD_DEFAULT),$createdAt,null,$bio);
                    break;
                case 'editor':
                    $users[$index] = new Editor($id,$username,$email,password_hash($password,PASSWORD_DEFAULT),$createdAt,null,$moderatelevel);
                default:
                    return false;
            }
            return true;
            }
        }
        return false;
    }
}