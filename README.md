# 📚 Application de gestion de catalogue de livres

Application web développée avec **Symfony 7**, **MySQL**, **Bootstrap 5** et **Pagerfanta**.  
Elle permet de gérer un catalogue de livres, de consulter leur état, leurs auteurs, éditeurs et commentaires, avec une navigation fluide et paginée.

---

## ✨ Fonctionnalités

### 📖 Catalogue de livres
- Affichage de la **liste des livres**
- Accès au **détail d’un livre**
- Association avec :
  - auteurs
  - éditeurs
  - commentaires

### 🧠 Gestion des données
- Schéma de base de données relationnelle :
  - Books
  - Authors
  - Editors
  - Comments
- Relations Doctrine (OneToMany / ManyToOne)
- Validation des données côté serveur (Validator Symfony)
- Persistance via **Doctrine ORM**

### 📄 Navigation & affichage
- Templates dynamiques avec **Twig**
- Pagination performante avec **Pagerfanta**
- Interface responsive grâce à **Bootstrap 5**

---

## 🧩 Architecture & bonnes pratiques

- Architecture MVC Symfony
- Séparation claire des responsabilités
- Utilisation des repositories pour la logique métier
- Routes organisées et nommées
- Code structuré et lisible

---

## 🚀 Technologies utilisées

- **Symfony 7**
- **PHP 8.1+**
- **Doctrine ORM**
- **MySQL**
- **Twig**
- **Bootstrap 5**
- **Pagerfanta**

---

## 📦 Prérequis

- PHP 8.1 ou supérieur
- Composer
- MySQL
- Serveur web (Apache, Nginx, WAMP, etc.)
- Git

---

## 🛠️ Installation

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/GabrielG-prog/projet-symfony-biblioth-que.git
   cd projet-symfony-biblioth-que
