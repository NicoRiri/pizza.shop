# Pizza Shop
Pizza Shop est un projet de qu'on a fait en 3ème année de BUT informatique pour apprendre à construire des API ainsi que manier les redrections à d'autres API pour gérer des tâches externes tels que l'authentification JWT.

## ️👥 Auteurs
- Bernardet Nicolas
- Gallion Laura
- Demarque Amaury
- Oudin Clément

## 💯Déploiement
Pour déployer l'application il suffit de lancer les conteneurs de pizza.shop.components

```cd pizza.shop.components```

```docker compose create```

```docker compose start```

## 📃 Mise en place de la BDD
Pour mettre en place la base de donnée il va également nous falloir les mots de passes ainsi que les infos clés nécessaires écritent au prochain point.

### 🍔 BDD commande
Pour la BDD commande on va se rendre sur le lien adminer et entrer ces paramètres :

- System : MySQL
- Server : pizza-shop.commande.db
- Username : root
- Password : r00tpizz
- Database : pizza_shop

Ensuite cliquer sur l'onglet importer afin d'importer les 2 fichiers .sql (l'ordre est important) venant de pizza.shop/shop.pizza-shop/sql/

- pizza_shop.commande.schema.sql
- pizza_shop.commande.data.sql

### 📁 BDD catalogue
Pour la BDD catalogue on va se rendre sur le lien adminer et entrer ces paramètres :

- System : PostgreSQL
- Server : pizza-shop.catalogue.db
- Username : pizza_cat
- Password : pizza_cat
- Database : pizza_catalog

Ensuite cliquer sur l'onglet importer afin d'importer les 2 fichiers .sql (l'ordre est important) venant de pizza.shop/shop.pizza-shop/sql/

- pizza_shop.catalogue.schema.sql
- pizza_shop.catalogue.data.sql

### 🔑 BDD authentification
Pour la BDD catalogue on va se rendre sur le lien adminer et entrer ces paramètres :

- System : MySQL
- Server : pizza-shop.auth.db
- Username : root
- Password : r00tppipzz
- Database : pizza_shop

Ensuite cliquer sur l'onglet importer afin d'importer les 2 fichiers .sql (l'ordre est important) venant de pizza.shop/auth.pizza-shop/sql/

- pizza_shop.auth.schema.sql
- pizza_shop.auth.data.sql

## 🏹 Liens utiles et compte

### ✨ Liens

- API de pizza.shop : http://localhost:2080
- API d'authentification de pizza.shop : http://localhost:2780
- Adminer : http://localhost:8080

### 👤 Compte

- nom d'utilisateur : AlixPerrot@free.fr
- mot de passe : AlixPerrot
