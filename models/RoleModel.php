<?php

//  require_once("./utils/Crud.php");

class Role extends Crud
{
    public $name;
    public $description;
    public $table = 'role';

  
    

    public function getRoleById($id)
    {
        // Vérifier si l'ID est null avant d'appeler getById
        if ($id !== null) {
            return $this->getById($this->table, $id);
        } else {
            
            return null; 
        }
    }
}
?>
