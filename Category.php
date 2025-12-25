<?php
class Categorie{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $createdAt;

    public function __construct(
        $id,
        $name,
        $description,
        $createdAt
    )
    {
        $this->id = $id;
        $this->id = $name;
        $this->id = $description;
        $this->id = $createdAt;
    }

}