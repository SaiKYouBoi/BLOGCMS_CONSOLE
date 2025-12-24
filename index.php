
<?php
$users = [
    new Admin(1, "admin_blog", "admin@blogcms.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW"),
    new Editor(2, "marie_dubois", "marie.dubois@email.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW"),
    new Author(3, "pierre_leroy", "pierre.leroy@gmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Tech blogger passionate about AI and emerging technologies."),
    new Author(4, "sophie_martin", "sophie.martin@protonmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Lifestyle writer focusing on wellness, travel, and sustainable living."),
    new Author(5, "jean_dupont", "jean.dupont@yahoo.fr", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Business journalist covering startups and entrepreneurship in Europe."),
    new Author(6, "lucie_bernard", "lucie.bernard@email.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Food critic and culinary expert sharing recipes and restaurant reviews."),
    new Author(7, "thomas_petit", "thomas.petit@gmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Sports analyst with expertise in football and Olympic sports."), 
    new Author(8, "julie_roux", "julie.roux@protonmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Fashion and beauty blogger exploring sustainable style trends."),
    new Author(9, "marc_vincent", "marc.vincent@yahoo.fr", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Political commentator analyzing French and European politics."),
    new Author(10, "isabelle_leroy", "isabelle.leroy@gmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Education specialist writing about teaching methods and child development."),
    new Author(11, "david_morel", "david.morel@email.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Gaming enthusiast covering video game reviews and industry news."),
    new Editor(12, "caroline_duval", "caroline.duval@protonmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW"),
    new Author(13, "nicolas_lambert", "nicolas.lambert@gmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Environmental activist writing about climate change and conservation."),
    new Author(14, "elodie_garnier", "elodie.garnier@email.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Health and fitness coach sharing workout routines and nutrition advice."), 
    new Author(15, "antoine_chevalier", "antoine.chevalier@yahoo.fr", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Music critic covering indie, rock, and electronic music scenes."),
    new Author(16, "clara_royer", "clara.royer@protonmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Financial advisor blogging about personal finance and investment strategies."),
    new Author(17, "quentin_menard", "quentin.menard@gmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Photography expert sharing tips on portrait and landscape photography."), 
    new Author(18, "amelie_colin", "amelie.colin@email.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Book reviewer specializing in contemporary fiction and literary classics."),
    new Editor(19, "vincent_gauthier", "vincent.gauthier@protonmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW"),
    new Author(20, "marine_lebrun", "marine.lebrun@gmail.com", "$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW", "Science communicator making complex topics accessible to general audiences.") 
];

abstract class User{
    protected int $id;
    protected string $username;
    protected string $email;
    protected string $passwordHash;
    protected DateTime $createdAt;
    protected DateTime $lasLogin;
    private ?DateTime $lastLogin = null;

    public function __construct(
        int $id,
        string $username,
        string $email,
        string $passwordHash,
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->createdAt = new DateTime();
    }

    abstract public function getRole(): string;


    
}

class Admin extends User{

     public function getRole(): string {
        return 'admin';
    }

}

class Author extends User{
    private string $bio;

     public function getRole(): string {
        return 'author';
    }

    public function __construct(int $id, string $username, string $email, string $passwordHash,$bio)
    {
        parent::__construct($id, $username, $email, $passwordHash);
        $this->bio = $bio;
    }

}


class Editor extends User{
    private string $moderationLevel;

     public function getRole(): string {
        return 'editor';
    }
}

class Article{
    private int $id;
    private string $title;
    private string $content;
    private string $status;
    private DateTime $createdAt;
    private ?DateTime $publishedAt = null;

    public function __construct(
        int $id,
        string $title,
        string $content,
        string $status,
        DateTime $createdAt,
        ?DateTime $publishedAt = null
    )
    {
         $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->publishedAt = $publishedAt;
    }

}

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