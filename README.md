## Blog d'Emilie Forteroche

## Pour utiliser ce projet : 

- Commencer par cloner le projet. 
- installez le projet chez vous, dans un dossier exécuté par un serveur local (type MAMP, WAMP, LAMP, etc...)
- Une fois installé chez vous, créez un base de données vide appelée : "blog_forteroche"
- Importez le fichier _blog_forteroche.sql_ dans votre base de données.

## Lancez le projet ! 

Pour la configuration du projet renomez le fichier _\_config.php_ (dans le dossier _config_) en _config.php_ et éditez le si nécessaire. 
Ce fichier contient notamment les informations de connextion à la base de données. 

Pour vous connecter en partie admin, le login est "Emilie" et le mot de passe est "password" (attention aux majuscules)

### Lancez avec Docker

Un fichier ``docker-compose.yml`` est disponible pour lancer la stack directement (Avec base de donnée et phpmyadmin)

Créer un réseau docker & docker-compose:
````shell
docker network create <network_name>
````

Lancer la stack:
````shell
docker-compose up -d --build
````
Le site ne se lance pas automatiquement (pas de serveur web), donc il faut entrer dans le conteneur:
````shell
docker exec -ti blog_forteroche /bin/sh
````

... et lancer php:
````shell
php83 -S 0.0.0.0:<PORT>
````

Les urls:
- http://localhost:8080 (blog)
- http://localhost:8081 (phpmyadmin)


## Problèmes courants :

Il est possible que la librairie intl ne soit pas activée sur votre serveur par défaut. Cette librairie sert notamment à traduire les dates en francais. Dans ce cas, vous pouvez soit utiliser l'interface de votre serveur local pour activer l'extention (wamp), soit aller modifier directement le fichier _php.ini_. 

Ce projet a été réalisé avec PHP 8.2. Bien que d'autres versions de PHP puissent fonctionner, il n'est pas garanti que le projet fonctionne avec des versions antérieures.

## Copyright : 

Projet utilisé dans le cadre d'une formation Openclassrooms. 
