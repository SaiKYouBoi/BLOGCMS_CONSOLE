---

# BlogCMS Console Edition

> A powerful command-line content management system for blogs, built with **PHP Object-Oriented Programming (OOP)** principles.

---

## Project Overview

**BlogCMS Console Edition** is a fully functional **command-line blog management system** designed for system administrators and content managers who prefer working in a terminal environment.

The project focuses on **clean architecture**, **separation of concerns**, and **core OOP concepts** without relying on external frameworks. It simulates a real-world CMS while remaining lightweight and easy to understand.

---

## Objectives

* Demonstrate **Object-Oriented Programming** in PHP
* Apply **SOLID principles**
* Separate responsibilities (Entities, Managers, Services)
* Manage blog content through **CLI commands**
* Keep the system simple, testable, and extensible

---

## Features

### Authentication & Roles

* User login system
* Role-based access control

  * **Admin**: full control
  * **Editor**: manage articles
  * **Visitor**: read-only access

### Article Management

* Create articles
* Edit existing articles
* Delete articles
* Publish / unpublish articles
* Draft system (`draft`, `published`)

### User Management (Admin only)

* Create users
* Assign roles
* List registered users

### Data Handling

* Data stored in **PHP arrays / files** (no database required)
* Clear separation between data and logic
* Easy to migrate later to a database

### 💻 Console Interface

* Interactive command-line menu
* Clear prompts and feedback messages
* Simple and intuitive navigation

---

## Project Architecture

```
BlogCMS/
│
├── src/
│   ├── Entity/
│   │   ├── User.php
│   │   └── Article.php
│   │
│   ├── Manager/
│   │   ├── UserManager.php
│   │   └── ArticleManager.php
│   │
│   ├── Auth/
│   │   └── AuthService.php
│   │
│   └── Console/
│       └── ConsoleApp.php
│
├── data/
│   ├── users.php
│   └── articles.php
│
├── index.php
└── README.md
```

---

## OOP Concepts Used

* Encapsulation
* Inheritance
* Polymorphism
* Abstraction
* Single Responsibility Principle (SRP)
* Dependency separation (Managers / Services)

---

## How to Run the Project

### Requirements

* PHP **8.0 or higher**
* Terminal / Command Prompt

### Run

```bash
php index.php
```

---
## Default Credentials (Example)

| Role   | Username | Password  |
| ------ | -------- | --------- |
| Admin  | admin    | admin123  |
| Editor | editor   | editor123 |

> Credentials are stored locally for demo purposes only.

---

## Possible Improvements

* Replace file storage with a database (MySQL / SQLite)
* Add article categories & tags
* Add comments system
* Export articles to Markdown or HTML
* Add unit tests

---

## Educational Purpose

This project is ideal for:

* Learning **PHP OOP**
* Understanding **CMS architecture**
* Practicing **CLI application design**
* Academic assignments or portfolio projects

---

