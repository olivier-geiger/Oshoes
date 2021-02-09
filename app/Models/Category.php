<?php

class Category extends CoreModel{
  // On va représenter toute nos colonnes 
  // sous la forme de propriétés 
  //! ATTENTION LES PROPRIETES DOIVENT AVOIR LE MEME NOM
  //! QUE LES COLONNES !
  private $name;
  private $subtitle;
  private $picture;
  private $home_order;



  // Methode qui va nous permettre de récuperer toute les entrées
  //  de la table category
  public function findAll()
  {
    // instancier un nouvel objet à partir de la classe PDO
    $pdo = Database::getPDO();
    // j'ecris la requete 

    $sql = '
      SELECT * FROM `category`
    ';
    // j'execute ma requete grace à query (car j'ai fais un SELECT)
    $pdoStatement = $pdo->query($sql);
    // je récupère des résultats dans $pdoStatement MAIS pour pouvoir exploiter ces résultats je dois
    // utiliser la methode fetch ou fetchAll (ici plusieurs résultats donc findAll)
    //! ATTENTION ICI on ne fait plus PDO::FETCH_ASSOC mais PDO::FETCH_CLASS
    //! On va donc recevoir un tableau indexé à partir de 0
    //! qui contient une liste l'objet instanciés à partir de la classe Category
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');
    return $results;
  }


  public function find($id)
  {
    $sql = '
      SELECT * 
      FROM `category`
      WHERE `id` = ' . $id ;
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    // petite nouveauté, je peux faire un fetchObject plutot qu'un fetch
    // Pour récuperer mes donn'es sou la forme d'UN objet qui sera instancie a partir de la classe 'Category'
    $result = $pdoStatement->fetchObject('Category');
    return $result;
  }







  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of subtitle
   */ 
  public function getSubtitle()
  {
    return $this->subtitle;
  }

  /**
   * Set the value of subtitle
   *
   * @return  self
   */ 
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;

    return $this;
  }

  /**
   * Get the value of picture
   */ 
  public function getPicture()
  {
    return $this->picture;
  }

  /**
   * Set the value of picture
   *
   * @return  self
   */ 
  public function setPicture($picture)
  {
    $this->picture = $picture;

    return $this;
  }

  /**
   * Get the value of home_order
   */ 
  public function getHomeOrder()
  {
    return $this->home_order;
  }

  /**
   * Set the value of home_order
   *
   * @return  self
   */ 
  public function setHomeOrder($home_order)
  {
    $this->home_order = $home_order;

    return $this;
  }

 




}