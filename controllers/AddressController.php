<?php

require_once './models/AddressModel.php';

class AddressController
{
    private $addressModel;

    public function __construct()
    {
        $this->addressModel = new Address();
    }

    public function viewAddress($addressId)
    {
        // Logic to retrieve and display the details of a specific address
        $address = $this->addressModel->getAddressById($addressId);
    }
}
