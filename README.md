# 📚 Application de gestion de catalogue de livres

C'est une application web développée avec **Symfony 7**, **MySQL**, **Bootstrap 5** et **Pagerfanta**.  
Elle permet de gérer un catalogue de livres, visualiser l’état de chaque livre, parcourir la liste avec pagination, et afficher les détails.

---

## 🧩 Fonctionnalités

L’application permet actuellement :

- Créer et maintenir un **schéma de base de données** pour les entités (Books, Authors, Editors, Comments)  
- **Récupérer et afficher des données** avec Twig  
- **Valider les données** côté serveur grâce aux contraintes de validation Symfony  
- **Sauvegarder des données en base** (Doctrine ORM)  
- Parcourir les livres avec **pagination (Pagerfanta)**  
- Afficher la liste des livres, leurs auteurs, éditeur et commentaires

> ⚠️ Le projet n’est pas encore terminé. Il manque l’implémentation de :  
> - Les **utilisateurs**  
> - L’**authentification**  
> - La gestion des **autorisations / rôles**

---

## 🚀 Technologies

- **Symfony 7** – Framework PHP  
- **Doctrine ORM** – Gestion de la base de données  
- **MySQL** – Base de données relationnelle  
- **Twig** – Moteur de templates  
- **Bootstrap 5** – UI / styles front  
- **Pagerfanta** – Pagination backend + composants Twig

---

## 📦 Prérequis

Avant d’installer le projet, assurez-vous d’avoir :

- PHP 8.1+  
- Composer  
- MySQL  
- Un serveur web (Apache, Nginx, WAMP, etc.)

---

## 🛠️ Installation

1. Clone le dépôt :
   ```bash
   git clone https://github.com/GabrielG-prog/projet-symfony-biblioth-que.git
   cd "votre dossier"
