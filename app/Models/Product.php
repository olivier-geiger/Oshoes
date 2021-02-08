<?php 


class Product {
  private $id;
  private $name;
  private $description;
  private $picture;
  private $price;
  private $rate;
  private $status;
  private $created_at;
  private $updated_at;
  private $brand_id;
  private $category_id;
  private $type_id;


  public function findAll(){
    // j'ecris la requête 
    $sql = '
      SELECT * FROM `product`
    ';
    // instancier un nouvel objet à partir de la classe PDO
    $pdo = Database::getPDO();
    // j'exécute ma requête grace à query (car j'ai fais un SELECT)
    $pdoStatement = $pdo->query($sql);
    // je récupère des résultats dans $pdoStatement MAIS pour pouvoir exploiter ces résultats je dois
    // utiliser la methode fetch ou fetchAll (ici plusieurs résultats donc findAll)
    //! ATTENTION ICI on ne fait plus PDO::FETCH_ASSOC mais PDO::FETCH_CLASS
    //! On va donc recevoir un tableau indexé à partir de 0
    //! qui contient une liste, l'objet instanciés à partir de la classe Category
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');
    return $results;// va chercher tous les produits dans la table products....

  }

  public function findAllByCategory($categoryId)
  {
    $sql = '
      SELECT * 
      FROM `product`
     WHERE category_id=' . $categoryId;
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $results;
  }

  public function find($id)
  {
    $sql = '
      SELECT * 
      FROM `product`
      WHERE `id` = ' . $id ;
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    // petite nouveauté, je peux faire un fetchObject plutot qu'un fetch
    // Pour récupérer mes données sous la forme d'UN objet qui sera instancié a partir de la classe 'Category'
    $result = $pdoStatement->fetchObject('Product');
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
   * Get the value of description
   */ 
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */ 
  public function setDescription($description)
  {
    $this->description = $description;

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
   * Get the value of price
   */ 
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */ 
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get the value of rate
   */ 
  public function getRate()
  {
    return $this->rate;
  }

  /**
   * Set the value of rate
   *
   * @return  self
   */ 
  public function setRate($rate)
  {
    $this->rate = $rate;

    return $this;
  }

  /**
   * Get the value of status
   */ 
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set the value of status
   *
   * @return  self
   */ 
  public function setStatus($status)
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get the value of created_at
   */ 
  public function getCreatedAt()
  {
    return $this->created_at;
  }

  /**
   * Set the value of created_at
   *
   * @return  self
   */ 
  public function setCreatedAt($created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }

  /**
   * Get the value of updated_at
   */ 
  public function getUpdatedAt()
  {
    return $this->updated_at;
  }

  /**
   * Set the value of updated_at
   *
   * @return  self
   */ 
  public function setUpdatedAt($updated_at)
  {
    $this->updated_at = $updated_at;

    return $this;
  }

  /**
   * Get the value of brand_id
   */ 
  public function getBrandId()
  {
    return $this->brand_id;
  }

  /**
   * Set the value of brand_id
   *
   * @return  self
   */ 
  public function setBrandId($brand_id)
  {
    $this->brand_id = $brand_id;

    return $this;
  }

  /**
   * Get the value of category_id
   */ 
  public function getCategoryId()
  {
    return $this->category_id;
  }

  /**
   * Set the value of category_id
   *
   * @return  self
   */ 
  public function setCategoryId($category_id)
  {
    $this->category_id = $category_id;

    return $this;
  }

  /**
   * Get the value of type_id
   */ 
  public function getTypeId()
  {
    return $this->type_id;
  }

  /**
   * Set the value of type_id
   *
   * @return  self
   */ 
  public function setTypeId($type_id)
  {
    $this->type_id = $type_id;

    return $this;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }
}