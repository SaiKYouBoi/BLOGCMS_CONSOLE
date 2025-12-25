<?php

class Admin extends User{

    private bool $isSuperAdmin;

    public function __construct(int $id, string $username, string $email, string $passwordHash,DateTime $createdAt,DateTime $lastLogin,$isSuperAdmin)
    {
       parent::__construct($id, $username, $email, $passwordHash,$createdAt,$lastLogin);
       $this->isSuperAdmin = $isSuperAdmin;
    }
     public function getRole(): string {
        return 'admin';
    }

}