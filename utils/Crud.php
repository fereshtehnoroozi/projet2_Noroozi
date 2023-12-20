<?php
class Crud
{
    public $connexion;

    public function __construct()
    {
        $host = "localhost";
        $db = "ecom2_project";
        $user = "root";
        $password = "";


        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $this->connexion = new PDO($dsn, $user, $password);
            if ($this->connexion) {
                echo "Connected to the $db database successfully";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function getAll(string $table): array
    {

        $PDOStatement = $this->connexion->query("SELECT * FROM $table ORDER BY id ASC");
        $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // methode pour un élément d'une table avec son id 
    public function getById(string $table, int $id): array

    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id"); // preparation de rqt sql pour affichage 
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->execute();
        $data = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }




    // methode pour ajouter un item 
    public function add($request, $itemdata): int|bool
    {
        $PDOStatement = $this->connexion->prepare($request);
        foreach ($itemdata as $key => $value) {
            if (is_int($value)) {
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_INT);
            } else {
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }
        }



        $PDOStatement->execute();


        if ($PDOStatement->rowCount() <= 0) {
            return false;
        }
        return $this->connexion->lastInsertId();
    }

    public function delete(string $table, int $id): string
    {
        $element = $this->getById($table, $id);
        if ($element) {
            $PDOStatement = $this->connexion->prepare("DELETE FROM $table WHERE id = :id"); // preparation de requete sql 
            $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
            $PDOStatement->execute();
            return "L'élément avec l'id " . $id . " a été supprimée.";
        } else {
            return "Élément introuvable";
        }
    }



    public function updateById($table, $itemData)
    {
        // Vérifier si la table et les données sont définies
        if (empty($table) || empty($itemData) || !isset($itemData['id'])) {
            return false;
        }

        $updateColumns = [];
        foreach ($itemData as $key => $value) {
            if ($key !== 'id') {
                $updateColumns[] = "$key = :$key";
            }
        }

        $updateColumnsString = implode(', ', $updateColumns);

        $request = "UPDATE $table SET $updateColumnsString WHERE id = :id";

        $PDOStatement = $this->connexion->prepare($request);

        foreach ($itemData as $key => $value) {
            if ($key !== 'id') {
                $PDOStatement->bindValue(':' . $key, $value, is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }
        }

        $PDOStatement->bindValue(':id', $itemData['id'], PDO::PARAM_INT);

        try {
            $PDOStatement->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Erreur d\'exécution de la requête : ' . $e->getMessage();
            return false;
        }
    }





    public function getByOneColumn($table, $col, $param)
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE $col = :param"); // preparation de rqt sql pour affichage 
        $PDOStatement->bindParam(':param', $param, PDO::PARAM_STR);
        $PDOStatement->execute();
        $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }





    public function __destruct()
    {
        $this->connexion = null;
    }
}
