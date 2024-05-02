# Documentation Technique du Projet

## Introduction

Ce document vise à fournir des instructions et des informations techniques pour les développeurs travaillant sur le projet. Le projet consiste en un site web développé en HTML, CSS, PHP, avec une base de données MySQL (MariaDB) et l'utilisation de Docker pour la gestion de l'environnement de développement. Symfony est également utilisé, avec l'utilisation de Vendor pour la gestion des variables d'environnement.

## Configuration de l'Environnement

1. **Installation de l'Environnement de Développement**
   - Pour Windows : Téléchargez Docker Desktop à partir du [site officiel](https://www.docker.com/products/docker-desktop) et PHP à partir du [site officiel PHP](https://windows.php.net/download#php-8.2).

   - Pour Debian : Exécutez les commandes suivantes pour installer Docker :
     ```bash
     sudo apt-get update
     sudo apt-get install docker-ce docker-ce-cli containerd.io
     ```
     Pour installer PHP, utilisez le gestionnaire de paquets approprié. Par exemple, pour PHP 8.2, vous pouvez utiliser :
     ```bash
     sudo apt-get install php8.2
     ```

   - Pour Fedora : Exécutez la commande suivante pour installer Docker :
     ```bash
     sudo dnf install docker-ce docker-ce-cli containerd.io
     ```
     Pour installer PHP, utilisez le gestionnaire de paquets approprié. Par exemple, pour PHP 8.2, vous pouvez utiliser :
     ```bash
     sudo dnf install php-8.2
     ```

2. **Arborescence des fichiers**
   Pour visualiser l'arborescence des fichiers du projet, veuillez consulter le fichier [d'arborescence 'tree.txt'](tree.txt).    

3. **Configuration Docker**
   - Utilisez la commande `docker-compose up -d --build` (pour Windows) ou `sudo docker-compose up -d --build` (pour Linux) pour démarrer les conteneurs Docker.

4. **Accès au Site et à phpMyAdmin**
   - Accédez au site en utilisant l'URL `localhost`.
   - Accédez à phpMyAdmin en utilisant l'URL `localhost:8081`.

## Installation de la Base de Données

1. **Importation de la Base de Données**
   - Copier coller le script [de la database SQL](my_db.sql) dans "SQL" sur phpMyAdmin afin d'avoir toutes les informations récentes de la database ou alors juste importer le fichier en le téléchargeant.

## Utilisation de l'API

1. **Accès à l'API**
   - Utilisez l'URL `localhost/api.php?table=table_name&id=id_number&password=password_api` pour accéder à l'API, où `table_name` est le nom de la table et `id_number` est l'identifiant et `password_api` le mot de passe pour l'api pour accéder aux informations users.

2. **Exemple**
   - Par exemple, pour accéder aux informations de l'utilisateur avec l'ID 10, utilisez l'URL : 

   `http://localhost/api.php?table=users&id=10&password=api_password`

   - Pour accéder à tous les informations des utilisateurs :
   
   `http://localhost/api.php?table=users&password=api_password`

   - Pour accéder aux informations du film avec l'ID 10 : 

   `http://localhost/api.php?table=film&id=10`

   - Pour accéder aux informations de tous les films : 

   `http://localhost/api.php?table=film`

   Les informations seront renvoyées au format JSON.

## Sécurité

1. **Gestion des Données Sensibles**
   - Les mots de passe et autres données sensibles sont stockés de manière sécurisée dans un fichier .env et gérés via Vendor.

2. **Mesures de Sécurité Additionnelles**
   - Utilisation de méthodes d'authentification et de mots de passes pour restreindre l'accès à certaines fonctionnalités de l'API.
   - Implémentation de contrôles d'accès pour éviter les accès non autorisés à certaines parties du site. Notamment le fait que certains accès bloquent la connexion et renvoient sur le index.php ou envoient un message d'erreur.

## Accès au Site et à la Base de Données

1. **Accès au Site**
   - Utilisez l'URL `localhost` pour accéder au site et naviguer dans ses fonctionnalités.

2. **Accès à la Base de Données**
   - Utilisez l'URL `localhost:8081` pour accéder à phpMyAdmin et gérer la base de données.