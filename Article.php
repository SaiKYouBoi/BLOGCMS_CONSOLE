<?php
class Article{
    private int $id;
    private string $title;
    private string $content;
    private string $status;
    private int $user_id;
    private DateTime $createdAt;
    private ?DateTime $publishedAt = null;

    public function __construct(
        int $id,
        string $title,
        string $content,
        string $status,
        int $user_id,
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->user_id = $user_id;
        $this->createdAt = new DateTime();
    }

    public function getArticleInfo():array{

        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'createdAt' => $this->createdAt,
            'publishedAt' => $this->publishedAt,
        ];
    }

}