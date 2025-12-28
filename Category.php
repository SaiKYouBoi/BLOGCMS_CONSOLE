<?php
class Category{
    private int $id;
    private string $name;
    private string $description;

    protected array $categories = [];
    private DateTime $createdAt;

    public function __construct(
        $id,
        $name,
        $description,
        $createdAt
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description= $description;
        $this->createdAt = $createdAt;
    }

    public function getCategoryInfo() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'createdAt' => $this->createdAt
        ];
    }

}