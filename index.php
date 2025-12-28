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

while (true) {
    echo "
    ------------ Main Menu ---------------
    1 - Login
    2 - Visit
    3 - Exit
";

    $main_choice = readline("Enter your choise: ");

    switch ($main_choice) {
        case 1: {
            $email = readline("Enter Your Email: ");
            $password = readline("Enter Your Password: ");

            while (true) {
                if (User::login($users, $email, $password)) {
                    $islogged = true;
                    switch ($user_role) {
                        case "admin": {
                            showAdminMenu();
                            break;
                        }
                        case "author": {
                            showAuthorMenu();
                            break;
                        }
                        case "editor": {
                            showEditorMenu();
                            break;
                        }
                        default:
                            break;
                    }
                    if (!$islogged) {
                        break;
                    }
                } else {
                    echo "Invalid Credentials";
                    break;
                }
            }
            break;
        }
        case 2: {
            echo "------ Articles ------";
            foreach ($articles as $article) {
                if ($article->getArticleInfo()['status'] === "published") {
                    $info = $article->getArticleInfo();

                    echo "ID: {$info['id']}\n";
                    echo "Title: {$info['title']}\n";
                    echo "Content: {$info['content']}\n";
                    echo "Status: {$info['status']}\n";
                    $category_name = "";
                    foreach ($categories as $category) {
                        if ($category->getCategoryInfo()['id'] === $info['category_id']) {
                            $category_name = $category->getCategoryInfo()['name'];
                            break;
                        }
                    }
                    echo "Category: {$category_name}\n";
                    $user_name = "";
                    foreach ($users as $author) {
                        if ($author->getUserInfo()['id'] === $info['user_id']) {
                            $user_name = $author->getUserInfo()['username'];
                            break;
                        }
                    }
                    echo "user: {$user_name}\n";
                    echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                    $published = $info['publishedAt'] ? $info['publishedAt']->format('Y-m-d H:i:s') : 'Not published yet';
                    echo "Created at: {$published}\n";
                    echo "--------------------------\n";
                }
            }
            break;
        }
        case 3: {
            exit();
        }
        default: {
            echo "Invalid choice";
            break;
        }
    }
}