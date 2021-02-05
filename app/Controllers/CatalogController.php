<?php

class CatalogController {

  function show($viewName, $viewData = [])
  {
    $viewData['curentPage'] = $viewName;
    // la superglobale $_SERVER donne un tableau associatif avec de nombreuses informations
    // l'entée "BASE_URI" permet d'avoir le chemin en absolu de la racine de mon projet
    // (on peut concat avec le dossier que l'on souhaite (ici assets)
   // on pourra donc l'appeler dans toute nos vues sans que cela dépende de là ou on se place.
    $assetsFolder = $_SERVER['BASE_URI'] . '/assets';
    $baseUri = $_SERVER['BASE_URI'] . '/';
    //  var_dump($assetsFolder);die();
    require __DIR__ . '/../views/header.tpl.php';
    require __DIR__ . '/../views/' . $viewName . '.tpl.php';
    require __DIR__ . '/../views/footer.tpl.php';
  }
    
  
  // ici la methode category va recevoir $match['params']
  // qui contient un tableau associatif avec une seule entrée : 
  // 'id' => idDetectéDansUrl
  function category($params)
  {
    //! ALLER CHERCHER TOUTE LES INFOS NECESSAIRES EN BDD
    //! Pour les transmettre à la vue
    // instancie un objet à partir de la classe Category ...
    $categoryModel = new Category();
    // Pour utiliser la methode findAll, qui va nous renvoyer tous les resultats
    //$allCategories = $categoryModel->findAll();
    //dump($allCategories);
    $oneCategory = $categoryModel->find($params['id']);
    //dump($oneCategory);
  
    // Aller chercher les produits qui ont pour categorie_id $params['id']
    $productModel = new Product();
    $products = $productModel->findAllByCategory($params['id']);



    // ici plutot que d'avoir un id => l'id Detecté
    // je préfère avoir un 'catgegoryId' pour etre plus précis
    $viewData = [
      'categoryId' => $params['id'],
      'category' => $oneCategory,
      'products' => $products
    ];
    $this->show('category', $viewData);
  }




  function type($params)
  {
    $viewData = [
      'typeId' => $params['id']
    ];
    $this->show('type', $viewData);
  }



  function brand($params)
  {
    $viewData = [
      'brandId' => $params['id']
    ];
    $this->show('brand', $viewData);
  }


  function product($params){
    $viewData = [
      'productId' => $params['id']
    ];

    $this->show('product', $viewData);


  }






}