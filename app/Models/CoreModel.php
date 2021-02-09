<?php

// modèle de base : c'est une classe mère dont vont heriter TOUS
// les models
// Cette classe n'est pas destinée à être instanciée,  mais seulement
// à etre héritée/étendue

class CoreModel {

  // ici, on évite de répéter les propriétés présentes dans tous les Models
  // On va factoriser dans la classe "parent" de tous les Models
  // visiblité protected pour un usage privé MAIS partagé avec la "famille"

  protected $id;
  protected $created_at;
  protected $updated_at;
  





  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }



  /**
   * Get the value of created_at
   */ 
  public function getCreatedAt()
  {
    return $this->created_at;
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



}