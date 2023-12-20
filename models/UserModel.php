
<?php
require_once('./utils/Crud.php');

class UserModel extends Crud
{


    public $email;
    public $token;
    public $username;
    public $fname;
    public $lname;
    public $pwd;
    public $billing_address_id;
    public $shipping_address_id;
    public $role_id;

    public $table = 'user';

    public function getUsers()
    {

        return $this->getAll($this->table);
    }



    public function getUserById($id)
    {

        return $this->getById($this->table, $id);
    }

    public function getUserByUsername(string $username)
    {

        return $this->getByOneColumn($this->table, 'username', $username);
    }




    public function updateToken($id, $newToken)
    {

        // Requête de mise à jour du token
        $request = "UPDATE user SET token = :token WHERE id = :id";


        $PDOStatement = $this->connexion->prepare($request);
        $PDOStatement->bindValue(':token', $newToken, PDO::PARAM_STR);
        $PDOStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $PDOStatement->execute();
    }

    public function addUser($userdata)
    {

        // Insérer l'utilisateur avec les ID 
        $request = " INSERT INTO $this->table (email, token, username, fname, lname, pwd, billing_address_id, shipping_address_id, role_id) VALUES (:email, '', :username, :fname, :lname, :pwd, 1, 1, 3)";


        $userdata = [
            'email' => $userdata['email'],
            'username' => $userdata['username'],
            'fname' => $userdata['fname'],
            'lname' => $userdata['lname'],
            'pwd' => $userdata['pwd'],

        ];

        return parent::add($request, $userdata);
    }





    public function updateProfile($userData)
    {

        session_start();
        if (isset($_SESSION['user']['id'])) {
            $userData['id'] = $_SESSION['user']['id'];

            // Definir  SQL requet
            $request = "UPDATE user SET email = :email, username = :username, fname = :fname, lname = :lname, pwd = :pwd WHERE id = :id";


            return $this->updateById($request, $userData);
        } else {
            echo "User not logged in.";
        }
        header("Location: login");
    }





    public function deleteUser($id)
    {
        return parent::delete($this->table, $id);
    }


    public function getUserRole($userId)
    {
        // Vérifier si $userId est null
        if ($userId === null && $userId == 3) {
            return null; // Ou une valeur par défaut 
        }

        $userData = $this->getById('users', $userId);
        return $userData['role_id'] ?? null;
    }
}




?>

