<?php

class CatalogController extends CoreController{
  
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
    //dump($allCategories);die();
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

    // je vais faire appel a mon Model !
    // Pour chercher par exemple le nom de la marque numero $params['id']

    $brandModel = new Brand();
    $brand = $brandModel->find($params['id']); 


    $viewData = [
      'brandId' => $params['id'],
      'brand' => $brand
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