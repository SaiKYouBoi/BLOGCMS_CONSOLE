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

}




?>