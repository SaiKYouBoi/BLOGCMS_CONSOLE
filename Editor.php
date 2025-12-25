<?php

class Editor extends User{
    private string $moderationLevel;

    public function __construct(int $id, string $username, string $email, string $passwordHash,DateTime $createdAt,?DateTime $lastLogin,$moderationLevel)
    {
        parent::__construct($id, $username, $email, $passwordHash,$createdAt,$lastLogin);
        $this->moderationLevel = $moderationLevel;
    }
     public function getRole(): string {
        return 'editor';
    }
}
