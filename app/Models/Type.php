<?php


class Type {
  private $id;
  private $name;
  private $footer_order;
  private $created_at;
  private $updated_at;
  

  public function findAll(){
    $pdo = Database::getPDO();
    $sql = '
      SELECT * FROM `type`
    ';
    $pdoStatement = $pdo->query($sql);
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type');
    return $results;
  }

  public function find($id){
    $sql = '
      SELECT * 
      FROM `type`
      WHERE `id` = ' . $id ;
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    // petite nouveauté, je peux faire un fetchObject plutot qu'un fetch
    // Pour récuperer mes donn'es sou la forme d'UN objet qui sera instancie a partir de la classe 'Category'
    $result = $pdoStatement->fetchObject('Type');
    return $result;
  }

  public function findFooterFive(){
    $pdo = Database::getPDO();
    $sql = '
      SELECT * 
      FROM `type`
      WHERE `footer_order` > 0
      ORDER BY `footer_order`
      LIMIT 5
    ';
    $pdoStatement = $pdo->query($sql);
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type');
    return $results;
  }



  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
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
   * Get the value of footer_order
   */ 
  public function getFooterOrder()
  {
    return $this->footer_order;
  }

  /**
   * Set the value of footer_order
   *
   * @return  self
   */ 
  public function setFooterOrder($footer_order)
  {
    $this->footer_order = $footer_order;

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
   * Get the value of created_at
   */ 
  public function getCreatedAt()
  {
    return $this->created_at;
  }
}