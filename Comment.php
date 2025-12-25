<?php
class Comment {
    private int $id;
    private string $content;
    private string $status;
    private DateTime $createdAt;

    public function __construct(
        $id,
        $content,
        $status,
        $createdAt
    )
    {
        $this->id = $id;
        $this->content = $content;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->id = $id;
    }
}