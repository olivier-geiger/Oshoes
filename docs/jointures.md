## Les jointures

doc :
https://sql.sh/cours/jointures


1ere requete : 

```sql
SELECT * 
FROM `product`
INNER JOIN `category`
```

Ici cette requette nous donne pour résultat les deux tables
"collés" l'une a l'autre sans correspondances .

2eme requete: 

```sql
SELECT * 
FROM `product`
INNER JOIN `category`
ON `product`.`category_id` = `category`.`id` 
```

Ici on précise que la colonne "category_id" de la table product
correspond a la colonne  "id" de la table "category"

Sur une seule ligne de mes résultat j'aurais donc toujours une correspondance entre le category_id (table prodcut) et l'id (table category)

3eme requete :

```sql
SELECT * 
FROM `product`
INNER JOIN `category`
ON `product`.`category_id` = `category`.`id` 
WHERE `product`.`id` = 4
```
On affiche tous les résultats pour le produit d'id 4 (resultats de la table product ET de la table category)


4eme requete :



```sql
SELECT `product`.`name` AS `product_name` , `category`.`name` AS `category_name`
FROM `product`
INNER JOIN `category`
ON `product`.`category_id` = `category`.`id`
WHERE `product`.`id` = 4
```

Afficher nom du produit et le nom de la marque pour le produit d'id 4 (en renomant les résultats grace aux alias (AS))