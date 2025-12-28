    <?php

    class ArticleManager
    {

        public static function deleteArticlebyId($id)
        {
            global $articles, $users;
            foreach ($articles as $index => $article) {
                if ($article->getArticleInfo()['id'] === $id) {
                    $user_id = $article->getArticleInfo()['user_id'];
                    unset($articles[$index]);
                    $articles = array_values($articles);
                    foreach ($users as $user) {
                        if ($user->getUserInfo()['id'] === $user_id) {
                            $user_articles = $user->getArticles();
                            foreach ($user_articles as $index => $article) {
                                if ($article->getArticleInfo()['id'] === $id) {
                                    unset($user_articles[$index]);
                                    $user->setArticles(array_values($articles));
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
            return false;
        }

        public static function updateArticle($article,$newtitle, $newcontent, $newcategory_id) {
            global $users;
            $updated = false;
            
            if ($newtitle) {
                $article->title = $newtitle;
                $updated = true;
            }
            
            if ($newcontent) {
                $article->content = $newcontent;;
                $updated = true;
            }
            
            
            if ($newcategory_id) {
                $article->category_id = $newcategory_id;;
            }

            foreach($users as $user){
                if($user->getUserInfo()['id'] == $article->getArticleInfo()['user_id'] ){
                    $userarticles = $user->getArticles();
                    foreach ($userarticles as $index => $uarticle) {
                        if($uarticle->getArticleInfo()['id'] == $article->getArticleInfo()['id']){
                            $userarticles[$index] = $article;
                            break;
                        }
                    }
                    $user->setArticles($userarticles);
                    break;
                }
            }

            return $updated;
        }


    }

?>