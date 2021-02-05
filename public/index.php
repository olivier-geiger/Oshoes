<?php
require __DIR__ . '/../app/Controllers/MainController.php';
require __DIR__ . '/../app/Controllers/CatalogController.php';

require __DIR__ . '/../app/Models/Product.php';
require __DIR__ . '/../app/Models/Category.php';
require __DIR__ . '/../app/Utils/Database.php';

//! inclure les dépendances composer
require __DIR__ . '/../vendor/autoload.php';


//! ATTENTION SUPER IMPORTANT
//! QUAND J'UTILISE ALTOROUTER 
//! J'AI L'INTERDICTION FORMELLE
//! D'avoir des ESPACES et/ou CARACTERES SPECIAUX
//! DANS LE NOM D'UN DES DOSSIERS QUI CONTIENT LE PROJET



// on vient réceptioner dans $pageName ce qui se passe dans l'url
// j'instancie un objet a partir de la classe AltoRouter
$router = new AltoRouter();
// on fournit a Altorouter la partie de l'URL à ne pas 
// prendre en compte pour faire la comparaison entre l'URL courante et l'URL de la route
$router->setBasePath($_SERVER['BASE_URI']);

// Mapper les routes = prévoir/définir les routes

// route accueil
$router->map(
  'GET', // la methode HTTP qui est autorisé
  '/', // l'url a laquelle cette route réagit
  // "target" : ce tableau stocke les noms de la methode
  // et du controleur qui vont se déclencher pour réagir a cette URL
  [
    'controller' => 'MainController',
    'action' => 'home'
  ],
  'home' // nom de la route (arbitraire)
);



// route mentions legaes
$router->map(
  'GET', // la methode HTTP qui est autorisé
  '/mentions-legales', // l'url a laquelle cette route réagit
  // "target" : ce tableau stocke les noms de la methode
  // et du controleur qui vont se déclencher pour réagir a cette URL
  [
    'controller' => 'MainController',
    'action' => 'legalMentions'
  ],
  'legal-mentions' 
);




// route categorie
$router->map(
  'GET', // la methode HTTP qui est autorisé
  '/catalogue/categorie/[i:id]', //! [i:id] nous indique qu'on a une partir dynamique dans l URL
  // "target" : ce tableau stocke les noms de la methode
  // et du controleur qui vont se déclencher pour réagir a cette URL
  [
    'controller' => 'CatalogController',
    'action' => 'category'
  ],
  'catalog-category' // nom de la route 
);


// route type
$router->map(
  'GET', // la methode HTTP qui est autorisé
  '/catalogue/type/[i:id]', //! [i:id] nous indique qu'on a une partir dynamique dans l URL
  // "target" : ce tableau stocke les noms de la methode
  // et du controleur qui vont se déclencher pour réagir a cette URL
  [
    'controller' => 'CatalogController',
    'action' => 'type'
  ],
  'catalog-type' // nom de la route 
);


// route marque
$router->map(
  'GET', // la methode HTTP qui est autorisé
  '/catalogue/marque/[i:id]', //! [i:id] nous indique qu'on a une partir dynamique dans l URL
  // "target" : ce tableau stocke les noms de la methode
  // et du controleur qui vont se déclencher pour réagir a cette URL
  [
    'controller' => 'CatalogController',
    'action' => 'brand'
  ],
  'catalog-brand' // nom de la route 
);


// route produit
$router->map(
  'GET', // la methode HTTP qui est autorisé
  '/catalogue/produit/[i:id]', //! [i:id] nous indique qu'on a une partir dynamique dans l URL
  // "target" : ce tableau stocke les noms de la methode
  // et du controleur qui vont se déclencher pour réagir a cette URL
  [
    'controller' => 'CatalogController',
    'action' => 'product'
  ],
  'catalog-product' // nom de la route 
);





// début dispatcher
// Ici on utilise une methode "magique" qui va nous permette 
// - de verifier si la route demandée existe bien (si la route n'existe pas $match sera egal a false)
// - et si la route existe bien, recueillir toute les informations de la route demandée dans $match
// (sous la forme d'un tableau multidimentionel)
$match = $router->match();
//dump($match);die();
// si je suis sur une route dynamique (categories par ex)
// dans $match j'ai une entrée "params" et dans params
// j'ai une entrée "id" qui contient la partie dynamique de l'adresse 
// $match['params']['id']

// si la route existe
if($match !== false){
  // je récupère le nom du controleur a utiliser GRACE A 
  //$match qui contient toutes les infos de la route si la route existe !
  $routeData = $match['target'];
  // ici je sors le nom du controleur
  $constrollerToUse = $routeData['controller'];
  // et le nom de la methode a utiliser
  $methodToUse = $routeData['action'];

  // J'instancie un nouvel objet a partir du Controleur dont
  // j'ai réceptioné le nom dans $constrollerToUse
  $controller = new $constrollerToUse();
  // Pour pouvoir utiliser la methode $methodToUse
  //! Et dans le cas ou je suis sur une route dynamique
  //! je viens  donner a $methodToUse la partie dynamique
  //! de mon URL ( $match['params'] est ici un tableau  associatif)
  //! qui contient une entrée 'id' => L-id-dans-url
  $controller->$methodToUse($match['params']);
  // si je suis sur la page d'accueil j'aurais :
  // $controller = new MainController();
  // $controller->home($match['params']);
  // si je suis sur la page /catalogue/categorie/5 j'aurais :
  // $controller = new CatalogController();
  // $controller->category([ 'id' => 5]);

} else {
  $controller = new MainController();
  $controller->pageNotFoundAction();
  // gestion de 404
}
