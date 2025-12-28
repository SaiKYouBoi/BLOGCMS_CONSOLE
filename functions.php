<?php

function showAdminMenu()
{
    global $users, $user_id, $articles,$categories;
    $current_user = null;
    foreach ($users as $user) {
        if ($user->getUserInfo()['id'] === $user_id) {
            $current_user = $user;
            break;
        }
    }
    echo "
 ------------- MAIN MENU ------------
    1.User Managment
    2.Article Management
    3.Category Management
    4.exit
        ";
    (int) $choice = readline("Your choice:");

    switch ($choice) {
        case 1: {

            echo "
 ------------- USER MANAGMENT ------------
    1.Create user
    2.List of Users
    3.exit
        ";

            $umchoice = readline("Your choice:");

            switch ($umchoice) {
                case 1: {
                    $bio = "";
                    $username = readline("Enter a username:");
                    $email = readline("Enter an email:");
                    $password = readline("Enter a password:");
                    $role = readline("Enter a role:");
                    if ($role === 'author') {
                        $bio = readline("Enter A bio for the author");
                    }

                    Admin::createUser($users, null, $username, $email, $password, $role, $bio);

                    break;
                }
                case 2: {
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
                    $found = false;
                    foreach ($users as $user) {
                        $info = $user->getUserInfo();
                        if ($info['username'] === $searchfor) {
                            echo "ID: {$info['id']}\n";
                            echo "Username: {$info['username']}\n";
                            echo "Role: {$info['role']}\n";
                            echo "Email: {$info['email']}\n";
                            echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                            echo "--------------------------\n";
                            echo "1.[Delete]   2.[Modify]\n";
                            $searchforid = $info['id'];
                            $found = true;
                        }
                    }

                    if (!$found) {
                        echo "NOT FOUND!";
                        return;
                    }

                    (int) $managaingchoice = readline("Chose a number:");


                    switch ($managaingchoice) {
                        case 1: {

                            if (Admin::deleteUserbyId($users, $searchforid)) {
                                echo "user deleted successfully\n";
                            } else {
                                echo "failed to delete user\n";
                            }
                            break;
                        }
                        case 2: {
                            $newusername = readline("Enter new username:");
                            $newemail = readline("Enter new email:");
                            $newpassword = readline("Enter new password");
                            echo "roles:
            1.admin
            2.author
            3.editor
        ";

                            (int) $choicerole = readline("Enter new role:");
                            $newbio = $newmoderation = "";

                            switch ($choicerole) {
                                case 1: {
                                    $role = 'admin';
                                    break;
                                }
                                case 2: {
                                    $newbio = readline("Enter the authors biography:");
                                    $role = 'author';
                                    break;
                                }
                                case 3: {
                                    $newmoderation = readline("Enter the editor moderatationlevel('junior','senior','chief'):");
                                    $role = 'editor';
                                    break;
                                }
                                default: {
                                    echo "invalid choice!";
                                    break;
                                }
                            }
                            if (Admin::modifyUserbyId($users, $searchforid, $newusername, $newemail, $newpassword, $role, $newbio, $newmoderation)) {
                                echo "user modified successfully\n";
                            } else {
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
                        }
                        default: {
                            echo "invalid choice";
                            break;
                        }
                    }
                    break;
                }
                case 3: {
                    break;
                }
                default: {
                    echo "invalid choice";
                    break;
                }
            }
            break;
        }

        case 2: {
            echo "
 ------------- ARTICLE MANAGMENT ------------
    1.Create Article
    2.Publish Article
    3.Modify Article
    4.Delete Article
    5.List of Articles
    6.exit
        ";
            (int) $amchoice = readline("Your choice:");
            switch ($amchoice) {
                case 1: {
                    $title = readline("Enter a title:");
                    $content = readline("Enter the content:");

                    echo "Available Categories:\n";
                    foreach ($categories as $category) {
                    $info = $category->getCategoryInfo();
                    echo "ID: {$info['id']} - {$info['name']}\n";
                    }

                    $category_id = readline("Enter category ID:");
                    $category_id = empty($category_id) ? null : (int)$category_id;

                    if ($category_id !== null) {
                    $categoryExists = false;

                    foreach ($categories as $category) {
                        if ($category->getCategoryInfo()['id'] === $category_id) {
                            $categoryExists = true;
                            break;
                        }
                    }

                     if (!$categoryExists) {
                        echo "Category ID not found.\n";
                        break;
                    }
                                                                                                                                                                                                                                                               
                    if ($current_user->createArticle($title, $content,$category_id)) {
                        echo "Article created successfully";
                    } else {
                        echo "Error while creating article";
                    }
                    break;
                }
            }
                case 5: {
                    foreach ($articles as $article) {
                        $info = $article->getArticleInfo();
                        
                        echo "ID: {$info['id']}\n";
                        echo "Title: {$info['title']}\n";
                        echo "Content: {$info['content']}\n";
                        echo "Status: {$info['status']}\n";
                        $category_name = "None";
                        
                        foreach ($categories as $category) {
                            if ($category->getCategoryInfo()['id'] === $info['category_id']) {
                                $category_name = $category->getCategoryInfo()['name'];
                                break;
                            }
                        }
                        echo "Category: {$category_name}\n";
                        echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                        $published = $info['publishedAt'] ? $info['publishedAt']->format('Y-m-d H:i:s') : 'Not published yet';
                        echo "Created at: {$published}\n";
                        echo "--------------------------\n";
                    }

                    $searchfor = readline("Search for a article(by id):");
                    $searchforid = null;
                    $found = false;
                    foreach ($articles as $article) {
                        $info = $article->getArticleInfo();
                        if($info['id'] === (int)$searchfor){
                        echo "ID: {$info['id']}\n";
                        echo "Title: {$info['title']}\n";
                        echo "Content: {$info['content']}\n";
                        echo "Status: {$info['status']}\n";
                        echo "Created at: {$info['createdAt']->format('Y-m-d H:i:s')}\n";
                        $published = $info['publishedAt'] ? $info['publishedAt']->format('Y-m-d H:i:s') : 'Not published yet';
                        echo "Created at: {$published}\n";
                        echo "--------------------------\n";
                        echo "1.[Delete]   2.[Modify]   3.[Publish]\n";
                        $searchforid = $info['id'];
                        $found = true;
                    }
                    }

                    if (!$found) {
                        echo "NOT FOUND!";
                        return;
                    }

                    (int) $managaingchoice = readline("Chose a number:");


                    switch ($managaingchoice) {
                        case 1: {

                            if (ArticleManager::deleteArticlebyId($searchforid)) {
                                echo "article deleted successfully\n";
                            } else {
                                echo "failed to delete article\n";
                            }
                            break;
                        }
                        case 2: {
                            $newtitle = readline("Enter new title:");
                            $newcontent = readline("Enter new content:");
                            
                            
                            echo "Available Categories:\n";
                            foreach ($categories as $category) {
                                $info = $category->getCategoryInfo();
                                echo "ID: {$info['id']} - {$info['name']}\n";
                            }
                            $new_category_id = readline("Enter new category ID:");
                            $new_category_id = empty($new_category_id) ? null : (int)$new_category_id;

                            break;
                        }
                        default: {
                            echo "invalid choice";
                            break;
                        }
                    }
                    break;
                }

                default:
                    break;
            }


            break;
        }

        case 4: {
            exit();
        }

        default: {

            echo "invalid choice\n";
            break;
        }
    }
}

