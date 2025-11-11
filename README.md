# Gestionnaire de Stock

## Description du Projet

Ce projet est une mini-application de gestion de stock développée en PHP utilisant PDO pour les interactions avec la base de données et PHPUnit pour les tests unitaires. Il offre une interface web simple pour gérer les produits (ajouter, modifier, supprimer) et calculer la valeur totale du stock.

## Fonctionnalités

- **Gestion des Produits** : Ajouter, modifier et supprimer des produits.
- **Calcul du Stock Total** : Calcul automatique de la valeur totale du stock.
- **Interface Web** : Pages web pour interagir avec le système de gestion de stock.
- **Tests Unitaires** : Couverture de tests avec PHPUnit pour assurer la fiabilité.

## Prérequis

- PHP 8.0 ou supérieur
- MySQL ou MariaDB
- Composer pour la gestion des dépendances
- Serveur web (par exemple, Apache via XAMPP)

## Installation

1. Clonez le dépôt :
   ```
   git@github.com:amabouak/Gestion-de-Stock-en-PHP-avec-PDO-et-PHPUnit.git
   cd stock-manager
   ```

2. Installez les dépendances avec Composer :
   ```
   composer install
   ```

3. Configurez la base de données :
   - Importez le fichier `database/stock_db.sql` dans votre base de données MySQL.
   - Modifiez les paramètres de connexion dans `src/Database.php` si nécessaire.

4. Lancez le serveur web (par exemple, avec XAMPP, placez le dossier dans htdocs et accédez via localhost).

## Utilisation

Accédez à l'interface web via `public/index.php`. Vous pouvez :

- Voir la liste des produits.
- Ajouter un nouveau produit via `add.php`.
- Modifier un produit existant via `edit.php`.
- Supprimer un produit via `delete.php`.

### Captures d'Écran

Voici quelques captures d'écran de l'interface web :

#### Page Principale
![Partie Web](captures/partieWeb.png)

#### Ajouter un Produit
![Ajouter Produit](captures/ajoutProduit.png)

#### Après Ajout
![Après Ajout](captures/apresAjout.png)

#### Modifier un Produit
![Modifier Produit](captures/modifierProduit.png)

#### Après Modification
![Après Modification](captures/apresModif.png)

#### Supprimer un Produit
![Supprimer Produit](captures/supprimerProduit.png)

#### Sortie du Test 1
![Sortie 1](captures/vendor1.png)

#### Sortie du Test 2
![Sortie 2](captures/vendor2.png)

## Tests

Pour exécuter les tests unitaires avec PHPUnit :

```
./vendor/bin/phpunit
```

Les tests sont organisés en :
- Tests unitaires pour les classes `Produit` et `StockManager`.
- Tests d'intégration pour les interactions avec la base de données.
- Tests d'acceptation pour les fonctionnalités globales.

## Structure du Projet

- `src/` : Code source principal (classes PHP).
- `public/` : Interface web (pages PHP et CSS).
- `database/` : Schéma de la base de données.
- `tests/` : Tests PHPUnit.
- `captures/` : Captures d'écran de l'application.

## Auteur

Khamis Amaboua
