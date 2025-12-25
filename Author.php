<?php

class Author extends User{
    private string $bio;

     public function getRole(): string {
        return 'author';
    }

    public function __construct(int $id, string $username, string $email, string $passwordHash,DateTime $createdAt,?DateTime $lastLogin,$bio)
    {
        parent::__construct($id, $username, $email, $passwordHash,$createdAt,$lastLogin);
        $this->bio = $bio;
    }

}