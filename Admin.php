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

        switch (strtolower($role)) {
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

    public static function modifyUserbyId($users,$id,$username,$email,$password,$role){
        global $users;
        foreach ($users as $index => $user) {
            if ($user->getUserInfo()['id']=== $id) {
                //to complete later
                return true;
            }
        }
        return false;
    }
}
 
function showAdminMenu()
{
    global $users;
    echo "
 ------------- MAIN MENU ------------
    1.User Managment
    2.Article Management
    3.Category Management
    4.exist
        ";
    (int) $choice = readline("Your choice:");

    switch ($choice) {
        case 1:    
            echo "
 ------------- USER MANAGMENT ------------
    1.Create user
    2.List of Users
    3.exist
        ";

    (int) $umchoice = readline("Your choice:");

            switch ($umchoice) {
                case 1:
                    
                    $username = readline("Enter a username:");
                    $email = readline("Enter an email:");
                    $password = readline("Enter a password:");
                    $role = readline("Enter a role:");
                    if ($role === 'author') {
                        $bio = readline("Enter A bio for the author");
                    }

                    Admin::createUser($users, null, $username, $email, $password, $role, $bio);
                    
                    break;
                default:
                    echo "invalid choice";
                    break;
            }
        case 2:

            foreach ($users as $user) {
                $info = $user->getUserInfo();
                echo "ID: {$info['id']}\n";
                echo "Username: {$info['username']}\n";
                echo "Role: {$info['role']}\n";
                echo "Email: {$info['email']}\n";
                echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                echo "--------------------------\n";
            }

            $searchfor = readline("Search for a user(by username):");
            $searchforid = null;
            foreach ($users as $user) {
                $info = $user->getUserInfo();
                if($info['username'] === $searchfor ){
                echo "ID: {$info['id']}\n";
                echo "Username: {$info['username']}\n";
                echo "Role: {$info['role']}\n";
                echo "Email: {$info['email']}\n";
                echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                echo "--------------------------\n";
                echo "1.[Delete]   2.[Modify]\n";
                $searchforid = $info['id'];
                }
            }
            (int) $managaingchoice = readline("Chose a number:");
            
           
            switch ($managaingchoice) {
                case 1:
                if(Admin::deleteUserbyId($users,$searchforid)){
                    echo "user deleted successfully\n";
                }else{
                    echo "failed to delete user\n";
                }
                    break;
                case 2:

                $newusername = readline("Enter new username:");
                $newemail = readline("Enter new email:");
                $newpassword = readline("Enter new password");
                $newrole = readline("Enter new role:");
                
                if(Admin::modifyUserbyId($users,$searchforid,$newusername,$newemail,$newrole,$newpassword)){
                    echo "user modified successfully\n";
                }else{
                    echo "failed to modify user\n";
                }
                
                foreach ($users as $user) {
                $info = $user->getUserInfo();
                echo "ID: {$info['id']}\n";
                echo "Username: {$info['username']}\n";
                echo "Role: {$info['role']}\n";
                echo "Email: {$info['email']}\n";
                echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                echo "--------------------------\n";
                }

                break;
                default:
                    echo "invalid choice\n";
                    break;
            }

            break;
        default:
            echo "invalid choice";
            break;
    }
}

