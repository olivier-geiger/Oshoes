## ETAPE 1

Cloné le répo qui contient l'integration HTML/CSS


## ETAPE 2 

Restructuration des dossiers : 
```
app
|
|-> Controllers
|
|-> views

public
|
|-> assets 
|     |
|     |-> css
|     |-> fonts
|     |-> images
|     |-> js
|     
|
|-> index.php
|-> .htaccess
```

## Etape 3 

On a comparé nos fichiers html pour une refactorisation
On a créé trois fichiers dans notre dossier /app/views
- header.tpl.php
- footer.tpl.php
- home.tpl.php

## Etape 4

- Placer .htaccess à la racine du dossier public
- Fabriquer notre index.php 
- On a récupéré $_GET['page'] (merci .htaccess)
- On a fabriqué nos routes
- On a fabriqué notre dispatcher

## Etape 5 

On fabrique le MainController avec deux methodes 
- home
- show



## Etape 6 

Tout est cassé, les liens d'images ne fonctionnent plus ! 
Pourquoi ? On a tout déplacé dans /assets