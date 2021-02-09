<?php

class MainController extends CoreController{

  
  
  
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