<?php
class Article{
    private int $id;
    private string $title;
    private string $content;
    private string $status;
    private Author $author;
    private DateTime $createdAt;
    private ?DateTime $publishedAt = null;

    public function __construct(
        int $id,
        string $title,
        string $content,
        string $status,
        Author $author,
        DateTime $createdAt,
        ?DateTime $publishedAt = null
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->author = $author;
        $this->createdAt = $createdAt;
        $this->publishedAt = $publishedAt;
    }

}