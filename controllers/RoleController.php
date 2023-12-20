<?php
require_once './models/RoleModel.php';

class RoleController
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new Role();
    }

    public function getRoleById($roleId)
    {
        $role = $this->roleModel->getRoleById($roleId);
        // Load view to display role details
        include_once './views/roleDetails.php';
    }
}
?>
