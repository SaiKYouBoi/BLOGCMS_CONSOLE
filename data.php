<?php
$users = [
    new Admin(1, "SaiKYouBoi", "saikyouboi@gmail.com", '$2y$12$exEBoerVJko9pSA791S51.NTg7u9lhdeLW2umg8BKp8JwdJ2aNrsS', new DateTime('2023-01-15'), new DateTime('2024-12-24'), true),
    new Editor(2, "marie_dubois", "marie.dubois@email.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-03-20'), new DateTime('2024-12-23'), 'junior'),
    new Author(3, "pierre_leroy", "pierre.leroy@gmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-04-10'), new DateTime('2024-12-22'), "Tech blogger passionate about AI and emerging technologies."),
    new Author(4, "sophie_martin", "sophie.martin@protonmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-05-05'), new DateTime('2024-12-20'), "Lifestyle writer focusing on wellness, travel, and sustainable living."),
    new Author(5, "jean_dupont", "jean.dupont@yahoo.fr", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-06-12'), new DateTime('2024-12-19'), "Business journalist covering startups and entrepreneurship in Europe."),
    new Author(6, "lucie_bernard", "lucie.bernard@email.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-07-08'), new DateTime('2024-12-18'), "Food critic and culinary expert sharing recipes and restaurant reviews."),
    new Author(7, "thomas_petit", "thomas.petit@gmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-08-14'), new DateTime('2024-12-17'), "Sports analyst with expertise in football and Olympic sports."), 
    new Author(8, "julie_roux", "julie.roux@protonmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-09-22'), new DateTime('2024-12-16'), "Fashion and beauty blogger exploring sustainable style trends."),
    new Author(9, "marc_vincent", "marc.vincent@yahoo.fr", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-10-11'), new DateTime('2024-12-15'), "Political commentator analyzing French and European politics."),
    new Author(10, "isabelle_leroy", "isabelle.leroy@gmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-11-05'), new DateTime('2024-12-14'), "Education specialist writing about teaching methods and child development."),
    new Author(11, "david_morel", "david.morel@email.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-12-01'), new DateTime('2024-12-13'), "Gaming enthusiast covering video game reviews and industry news."),
    new Editor(12, "caroline_duval", "caroline.duval@protonmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-02-18'), new DateTime('2024-12-23'), 'senior'),
    new Author(13, "nicolas_lambert", "nicolas.lambert@gmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-01-10'), new DateTime('2024-12-12'), "Environmental activist writing about climate change and conservation."),
    new Author(14, "elodie_garnier", "elodie.garnier@email.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-02-14'), new DateTime('2024-12-11'), "Health and fitness coach sharing workout routines and nutrition advice."), 
    new Author(15, "antoine_chevalier", "antoine.chevalier@yahoo.fr", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-03-20'), new DateTime('2024-12-10'), "Music critic covering indie, rock, and electronic music scenes."),
    new Author(16, "clara_royer", "clara.royer@protonmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-04-15'), new DateTime('2024-12-09'), "Financial advisor blogging about personal finance and investment strategies."),
    new Author(17, "quentin_menard", "quentin.menard@gmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-05-12'), new DateTime('2024-12-08'), "Photography expert sharing tips on portrait and landscape photography."), 
    new Author(18, "amelie_colin", "amelie.colin@email.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-06-18'), new DateTime('2024-12-07'), "Book reviewer specializing in contemporary fiction and literary classics."),
    new Editor(19, "vincent_gauthier", "vincent.gauthier@protonmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2023-01-25'), new DateTime('2024-12-24'), 'chief'),
    new Author(20, "marine_lebrun", "marine.lebrun@gmail.com", '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', new DateTime('2024-07-22'), new DateTime('2024-12-06'), "Science communicator making complex topics accessible to general audiences.") 
];


$articles = [
    new Article(
        1,
        "The Rise of Artificial Intelligence",
        "Artificial Intelligence is transforming industries from healthcare to finance...",
        "published",
        $users[3],
        new DateTime("2025-01-10 09:15:00"),
        new DateTime("2025-01-12 08:00:00")
    ),
    new Article(
        2,
        "Why Sustainable Living Matters",
        "Sustainable living is no longer a trend but a necessity in modern society...",
        "published",
        $users[4],
        new DateTime("2025-01-15 14:30:00"),
        new DateTime("2025-01-16 10:00:00")
    ),
    new Article(
        3,
        "Getting Started with PHP OOP",
        "Object-Oriented Programming in PHP helps structure applications in a clean way...",
        "draft",
        $users[5],
        new DateTime("2025-02-01 11:45:00"),
        null
    ),
    new Article(
        4,
        "Healthy Habits for Busy Professionals",
        "Maintaining healthy habits can be challenging when life gets busy...",
        "archived",
        $users[6],
        new DateTime("2024-12-05 16:20:00"),
        new DateTime("2024-12-06 09:00:00")
    ),
    new Article(
        5,
        "Understanding Climate Change",
        "Climate change affects ecosystems, economies, and daily life across the globe...",
        "published",
        $users[3],
        new DateTime("2025-02-20 08:00:00"),
        new DateTime("2025-02-21 07:30:00")
    )
];


