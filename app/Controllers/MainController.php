<?php

class MainController {

  function show($viewName, $viewData = [])
  {
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
  
  
  function home()
  {
    $this->show('home');
  }


  function pageNotFoundAction()
  {
    // ici du nouveau on utilise header non pas pour une redirection
    // mais pour envoyer un code 404 !
    //header('HTTP/1.0 404 Not found');
    //je peux aussier utiliser :
    http_response_code(404);
    $this->show('err404');
  }

  function legalMentions(){
    $this->show('mentions');
  }







}