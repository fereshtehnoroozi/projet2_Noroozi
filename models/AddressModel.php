<?php
require_once('./utils/Crud.php');

class Address extends Crud  {

    public $id;
    public $street_name;
    public $street_nb;
    public $city;
    public $province;
    public $zipcode;
    public $country;
    public $table = 'address';


    public function getaddressById($id){
        return $this->getById($this->table, $id);
   }






    
}
