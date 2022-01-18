<?php
namespace Model;

use Database\Connection;

include(__DIR__ . '/../Database/Connection.php');

class Product
{
    protected $db;

    function __construct()
    {
        $db = new Connection();
        $this->db = $db->Connect();
    }

    public function getAllProduct()
    {
        $query = "SELECT * FROM product";

        return mysqli_query($this->db, $query);
    }
    
    public function getProduct($id = null)
    {
        $query = "SELECT * FROM product WHERE id = " . $id;

        return mysqli_query($this->db, $query);
    }

    public function storeProduct($name = null, $stock = null, $price = null)
    {
        $query = "INSERT INTO product (name, stock, price) VALUES ('$name', '$stock', '$price')";

        if (mysqli_query($this->db, $query)) {
            mysqli_close($this->db);
            return 'success';
        } else {
            $error = mysqli_error($this->db);
            mysqli_close($this->db);

            return $error;
        }
    }

    public function updateProduct($id = null, $name = null, $stock = null, $price = null)
    {
        $query = "UPDATE product SET name = '$name', stock = '$stock', price = '$price' WHERE id = '$id'";

        if (mysqli_query($this->db, $query)) {
            mysqli_close($this->db);
            return 'success';
        } else {
            $error = mysqli_error($this->db);
            mysqli_close($this->db);

            return $error;
        }
    }

    public function deleteProduct($id = null)
    {
        $query = "DELETE FROM product WHERE id = '$id'";

        if (mysqli_query($this->db, $query)) {
            mysqli_close($this->db);
            return 'success';
        } else {
            $error = mysqli_error($this->db);
            mysqli_close($this->db);

            return $error;
        }
    }
}