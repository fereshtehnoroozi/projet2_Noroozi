
<?php
require_once('./utils/Crud.php');

class ProductModel extends Crud
{

    public $id;
    public $name;
    public $qtty;
    public $price;
    public $url_img;
    public $description;
    public $table = 'product';

    public function getProducts()
    {

        return $this->getAll($this->table);
    }

    public function getProductById($id)
    {

        return $this->getById($this->table, $id);
    }



    public function addProduct($productdata)
    {


        $request = "INSERT INTO $this->table (name, qtty, price, url_img, description) VALUES (:name, :qtty, :price, :url_img, :description)";
        return parent::add($request, $productdata);
    }

    public function updateProduct($productdata)

    {
        $this->name = $productdata['name'];
        $productdata = [

            'name' => $this->name,
            'qtty' => $this->qtty,
            'price' => $this->price,
            'url_img' => $this->url_img,
            'description' => $this->description,
            'id' => $this->id
        ];

        var_dump($productdata);
        echo '</br></br>';
        $request = "UPDATE product SET name = :name, qtty = :qtty, price = :price, url_img = :url_img, description = :description  WHERE id = :id";
        parent::updateById($request, $productdata);
    }

    public function deleteProduct($id)
    {
        return parent::delete('product', $id);
    }
}


?>

