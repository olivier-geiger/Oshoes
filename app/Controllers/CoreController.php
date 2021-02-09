<?php

class CoreController {
    
    /**
     * DOCBLOC
     * Méthode permettant d'afficher un rendu HTML
     * @param string $viewname
     * @param array $viewData
     * @return void
     */

    protected function show($viewName, $viewData = [])
    {
      // ici pour rappel je précise "protected" pour que ma méthode
      // show() soit accessble aux enfants de la classe CoreController
      //! Pour generer mes liens dans mes template j'ai besoin de $router
      // $router est en DEHORS de la methode show, pour y acceder rapidement je peux faire :
      global $router;
      //! ATTENTION ATTENTION ATTENTION CECI N'EST PAS UNE BONNE PRATIQUE
      
  
      // Etant donné que toute les methodes de mon Controleur
      // font appel a la methode show.
      // Et etant donné qu'on a besoin des infos de la table brand
      // dans le footer de toute les pages,
      // je vais directement faire appel a mon model dans la methode
      // show ! 
      $brandModel = new Brand();
      $footerFiveBrands = $brandModel->findFooterFive();

      $typeModel = new Type();
      $footerFivetypes = $typeModel->findFooterFive();
  
      $baseUri = $_SERVER['BASE_URI'] . '/';

      $viewData['curentPage'] = $viewName;
      // la superglobale $_SERVER donne un tableau associatif avec de nombreuses informations
      // l'entée "BASE_URI" permet d'avoir le chemin en absolu de la racine de mon projet
      // (on peut concat avec le dossier que l'on souhaite (ici assets)
     // on pourra donc l'appeler dans toute nos vues sans que cela dépende de là ou on se place.
      $assetsFolder = $_SERVER['BASE_URI'] . '/assets';
      //  var_dump($assetsFolder);die();
      require __DIR__ . '/../views/header.tpl.php';
      require __DIR__ . '/../views/' . $viewName . '.tpl.php';
      require __DIR__ . '/../views/footer.tpl.php';
    }
}