# Projet Livraisons Raphael Boussidan

## Introduction

Projet pour classe de CSI 2020 utilisant Symfony.

## Instructions

### Comment installer

* Executer:

      composer install
      
* Editer `.env.local` selon `.env` avec l'URL de la base de donnees MySQL.

* (Optionnel) Importer le fichier livraison.sql vers la base de donnees MySQL

### Comment demarrer

    symfony server:start
    
## Fonctionnalites

1. Deux CRUD avec stylisation Bootstrap

    http://localhost:8000/client
    http://localhost:8000/livraison
    
2. Deux vues heritant du twmplate twig "base", egalement stylisees avec Bootstrap

    http://localhost:8000/show_client/{id}
    http://localhost:8000/show_all_clients
    
    Ces vues utilisent leurs propres controleur `ClientViewController`,
    ainsi que leurs routes ci-dessus

3. Inclusion de Javascript

    Dans les deux vues ci-dessus, les commandes apparaissent 
en tant que modal de Bootstrap, utilisant JQuery (inclus dans le twig de base)

4. Formulaire

    Creation du type Produit, et d'un formulaire cree manuellement avec CSS a l'adresse
    
        http://localhost:8000/new_produit
    
    Qui redirige vers une vue a
    
        http://localhost:8000/show_all_produits
