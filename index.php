<?php
require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/User.php";
require_once __DIR__ . "/Admin.php";
require_once __DIR__ . "/Author.php";
require_once __DIR__ . "/Editor.php";
require_once __DIR__ . "/Article.php";
require_once __DIR__ . "/ArticleManager.php";
require_once __DIR__ . "/Category.php";
require_once __DIR__ . "/Comment.php";
require_once __DIR__ . "/data.php";

echo "
    ------------ Login ---------------
";
$email = readline("Enter Your Email: ");
$password = readline("Enter Your Password: ");

while (true) {
    if (User::login($users, $email, $password)) {
        switch ($user_role) {
            case "admin": {
                showAdminMenu();
                break;
            }
            case "author": {
                echo "author";
                break;
            }
            case "editor": {
                echo "editor";
                break;
            }
            default:
                # code...
                break;
        }
    } else {
         echo "Invalid Credentials";
    }
}