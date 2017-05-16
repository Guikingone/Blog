# Créez votre premier blog en PHP

Ça y est vous avez sauté le pas ! Le monde du développement web avec PHP est à portée de main et vous avez besoin de visibilité pour pouvoir convaincre vos futurs employeurs/clients en un seul regard. Vous êtes développeur PHP, il est donc temps de montrer vos talents au travers d’un blog à vos couleurs.

### Description du besoin

Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs ;
les pages permettant d’administrer votre blog.
Voici la liste des pages qui devront être accessibles depuis votre site web :

- la page d'accueil ;
- la page listant l’ensemble des blogs posts ;
- la page affichant un blog post ;
- la page permettant d’ajouter un blog post et la page permettant de modifier un blog post.
- Il n’y aura pas de gestion d’utilisateurs à faire (authentification / autorisation). Nous verrons cela dans un prochain projet ^^. Tout est donc visible de tous et tout le monde est en mesure de créer/modifier du contenu aussi.

Commençons par les pages utiles à tous les internautes.

Sur la page d’accueil il faudra présenter les informations suivantes :

- votre nom et prénom
- Une photo et/ou un logo
- Une phrase d’accroche qui vous ressemble ( exemple : “Martin Durand, le développeur qu’il vous faut !”) ;
- Un menu permettant de naviguer parmi l’ensemble des pages de votre site web ;
- Un formulaire de contact (à la soumission de ce formulaire, un email avec toutes ces informations vous serons envoyé) avec les champs suivants :
- Nom / prénom
- Email de contact
- Message
- un lien vers votre CV au format pdf
- L’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (Github, LinkedIn, Twitter…).

Sur la page listant tous les blogs posts (du plus récent au plus ancien), il faut afficher les informations suivantes pour chaque blog post :

- le titre
- la date de dernière modification
- le châpo
- Un lien vers le blog post

Sur la page présentant le détail d’un blog post, il faut afficher les informations suivantes :

- le titre ;
- le chapô ;
- le contenu ;
- l’auteur ;
- la date de dernière mise à jour ;
- Un lien vers le formulaire de modification d’un blog post.

Sur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu.

Dans le menu, il doit figurer un lien pour accéder à la page de création d’un blog post.‌

### Contraintes

Cette fois-ci nous n’utiliserons pas WordPress. Tout sera développé par vos soins. Les seuls lignes de code qui peuvent provenir d’ailleurs seront celles du thème Bootstrap que vous prendrez grand soin de choisir. La présentation, ça compte ! Il est également autorisé d’utiliser une ou plusieurs librairies externes à condition qu’elles soient intégrées grâce à Composer.

Attention, votre blog doit être navigable aisément sur un mobile (Téléphone mobile, phablette, tablette…). C’est indispensable :D

Nous vous conseillons vivement d’utiliser un moteur de templating tel que Twig, mais ce n’est pas obligatoire.

Important : Vous vous assurerez qu’il n’y a pas de failles de sécurité (XSS, CRSF, SQL injection, session hijacking, upload possible de script php…).

Votre projet doit être poussé et disponible sur Github. Je vous conseille de travailler avec des pull requests. Dans la mesure où la majorité des communications concernant les projets sur Github se font en anglais, il faut que vos commits soient en anglais.

Vous devrez créer l’ensemble des issues (tickets) correspondant aux tâches que vous aurez à effectuer pour mener à bien le projet.

Veillez à bien valider vos tickets pour vous assurer que ceux-ci couvrent bien toutes les demandes du projet. Donnez une estimation indicative en temps ou en points d’efforts (si la méthodologie agile vous est familière) et tentez de tenir cette estimation.

L’écriture de ces tickets vous permettront de vous accorder sur un vocabulaire commun et Il est fortement apprécié qu’ils soient écrits en anglais !

## Nota Bene

Si vous n’arrivez pas à vous décider sur le thème Bootstrap, en voici un qui pourrait vous convenir [StartBootstrap]('http://bit.ly/2emOTxY').

Dans le cas où une fonctionnalité vous semblerait mal expliquée ou manquante, parlez-en avec votre mentor afin de prendre une décision ensemble sur les choix que vous souhaiteriez prendre. Ce qui doit prévaloir doit être les délais.

## Suivi

Insight 

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/1bbe11bc-ecd9-4973-bb81-2cb7bea15169/big.png)](https://insight.sensiolabs.com/projects/1bbe11bc-ecd9-4973-bb81-2cb7bea15169)


## Usage 

### PHP

Pour utiliser ce projet en envrionnement de développement : 

```bash
cd web

php -S localhost:9800 /app.php
```

Pour lancer les tests : 

```bash
phpunit -v 
```

### Docker (Apache + PHP + Postgres)

Par défaut, ce projet utilise Docker pour le développement ainsi que le déploiement, pour utiliser
Docker dans le projet, voici la procédure : 

```bash
docker-compose up -d --name blog
```

Par défaut, le projet se lance sur le port 9800 de votre machine, pour lancer les tests

```bash
docker exec blog phpunit -v
```
