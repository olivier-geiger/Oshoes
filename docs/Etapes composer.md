## SI COMPOSER N'EST PAS INSTALL

on va sur https://getcomposer.org/download/
On copie les lignes de code et on les colle dans le terminal : 

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```


Lorsque cette commande est executée, un fichier .phar est généré, il nous faut alors faire la ligne de commande suivante pour terminer l'installation et rendre notre commande globale :

```
sudo mv composer.phar /usr/local/bin/composer
```

## Pour installer le module var_dumper avec composer


- je suis allé sur le site https://packagist.org/
- j'ai cheché le module a installer (var_dumper)
- J'ai copié la commande d'installation pour la coller dans un terminal a la racine du dossier s05-Oshop
  
** Informations importantes **

Plusieurs fichiers et un dossier on étés générés

- Dossier vendor : va contenir les modules et dépendances
- Composer.json : Contient [entre autre] la liste des modules installés
- Composer.lock : lié au versioning, a voir plus tard.

## Et quand je partage un projet ?



