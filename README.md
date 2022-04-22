# 
# SendCloud API PHP

Ce simple fichier PHP vous permet de créer des commandes très facilement et d'automatiquement télécharger le fichier PDF de l'étiquette générée par SendCloud.<br/>
Ce Git sera sûrement mis à jour prochainement avec le même système mais permettant d'imprimer automatiquement et directement les étiquettes depuis n'importe quelle imprimante sans devoir télécharger ces dernières.

## 🧢 Fonctionnalités
- Connexion à l'API en une seule ligne de code.
- Création de commandes personnalisés en une seule ligne de code.
- Création et téléchargement de l'étiquette de la dernière commande en une seule ligne de code.

Donc oui ! Ce simple fichier PHP vous permet de tout faire en simplement trois petites lignes de code PHP !

## ⛑ Comment l'utiliser ?


- Inclusion du fichier dans votre projet :
```PHP
include ".././<chemin vers le fichier shipping.php>";
```

- Utilisation du fichier et connexion à l'API :
```PHP
$order = new shipping();
$order->connectToApi("Votre clé API Publique", "Votre clé API Secrète");
```
    Pour obtenir vos clés API rendez-vous sur le site : https://panel.sendcloud.sc/v2/settings/integrations/manage
    et créez une nouvelle boutique connectée "SendCloud API".

- Création d'une commande :
```PHP
$order->createOrder(1, "2", "3", "4", "5", "6", "7");
```

    Remplissez avec les informations dites ci-dessous :
    Le n°1 n'a pas besoin de guillemets.

    - 1 : Identifiant de l'expéditeur du colis (ex : Chronopost, Collissimo, etc...).
    - 2 : Nom et prénom du client.
    - 3 : Entreprise du client (facultatif, peux être vide).
    - 4 : Adresse de livraison (ex : 01 rue du moulin)
    - 5 : Ville de livraison (ex : Paris).
    - 6 : Code postal de livraison (ex : 75000).
    - 7 : Pays de livraison (ex : FR).

- Trouver l'identifiant d'un expéditeur :
```PHP
$order->findShippingMethod();
```
    Pour ensuite trouver un expéditeur en particulier, faites CTRL+F dans votre page de résultat
    puis taper le nom de l'expéditeur OU l'acronyme de votre pays (ex : FR).


## 📌 Important !

Ce fichier PHP utilise la librairie "SendCloud PHP Client" de Picqer pour fonctionner :<br>
https://github.com/picqer/sendcloud-php-client

## 🎁 Merci !

Merci d'être compréhensif, ceci est mon premier vrai Git publique, j'espère qu'il vous aidera.
You need "sendcloud_php_client" and composer to use this !
