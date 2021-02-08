## Récupérer tous les produits 

```sql
SELECT * 
FROM `product`
```


## 5 Types dans le footer

```sql
SELECT * 
FROM `type`
WHERE `footer_order` > 0
ORDER BY `footer_order`
LIMIT 5
```

##  5 Marques dans le footer

```sql
SELECT * 
FROM `brand`
WHERE `footer_order` > 0
ORDER BY `footer_order`
LIMIT 5
```

##  5 Categories mises en avant

```sql
SELECT * 
FROM `category`
WHERE `home_order` > 0
ORDER BY `home_order`
LIMIT 5

```

## Tous les produits de la catégorie #1 triés par prix croissant

```sql
SELECT * 
FROM `product`
WHERE `category_id` = 1
ORDER BY `price` ASC

```

## Tous les produits de la catégorie #1 triés par nom croissant

```sql
SELECT * 
FROM `product`
WHERE `category_id` = 1
ORDER BY `name` ASC

```

## Tous les produits de la marque #2 triés par nom croissant

```sql
SELECT * 
FROM `product`
WHERE `brand_id` = 2
ORDER BY `name` ASC
```



## Tous les produits de la marque #2 triés par prix croissant

```sql
SELECT * 
FROM `product`
WHERE `brand_id` = 2
ORDER BY `price` ASC
```


## Les infos sur le produit #1 + nom de la catégorie + nom de la marque

```sql
SELECT `product`.`id` AS `product_id`, `category`.`name`, `brand`.`name`
FROM `product`
LEFT JOIN `brand` ON `brand`.`id` = `product`.`brand_id`
LEFT JOIN `category` ON `category`.`id` = `product`.`category_id`
WHERE `product`.`id` = 1
```

