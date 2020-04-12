<?php

/**
 * Undocumented class
 */
class SitesModel extends CI_Model
{

  public function __construct(){
    $this->load->database();
  }

  public function getSites(){
    $query = "
    SELECT 
      md5(id_site) id_site,
      name,        
      url,         
      image_url,   
      description,
      technologies,
      filter      
    FROM 
      site 
    WHERE 
      status = ". ACTIVE ." ;";
    $result = $this->db->query($query)->result_array();
    return $result;
  }

  public function addMessage($name, $email, $message){
    try {
      $query = "
      INSERT INTO contact
        (name, email, message)
      SELECT 
        '$name', '$email', '$message'
      ;";
      $this->db->query($query);
    } catch (PDOException $ex) {
      throw $ex;
    }
  }
}
