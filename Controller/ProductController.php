<?php

namespace Controller\ProductController;

include(__DIR__ . '/../Model/Product.php');

use Model\Product;

class ProductController
{
    public function store(string $name = null, int $stock = 0, int $price = 0)
    {
        if (!$name || !$stock || !$price) {
            session_start();
            $_SESSION['status'] = 'Error. Ada data kosong, silahkan coba kembali.';
            header('Location: ../View/tambah.php');
            exit;
        }

        $model = new Product();
        $result = $model->storeProduct($name, $stock, $price);

        if ($result == 'success') {
            session_start();
            $_SESSION['status'] = 'Produk berhasil ditambahkan';
            header('Location: ../View/index.php');
            exit;
        } else {
            session_start();
            $_SESSION['status'] = 'Produk gagal ditambahkan. ' . $result;
            header('Location: ../View/tambah.php');
            exit;
        }
    }

    public function update(int $id = null, string $name = null, int $stock = null, int $price = null)
    {
        $model = new Product();
        $result = $model->updateProduct($id, $name, $stock, $price);

        if ($result == 'success') {
            session_start();
            $_SESSION['status'] = 'Produk berhasil diubah';
            header('Location: ../View/index.php');
            exit;
        } else {
            session_start();
            $_SESSION['status'] = 'Produk gagal diubah. ' . $result;
            header('Location: ../View/tambah.php');
            exit;
        }
    }
    public function delete(int $id = null)
    {
        $model = new Product();
        $result = $model->deleteProduct($id);

        if ($result == 'success') {
            session_start();
            $_SESSION['status'] = 'Produk berhasil dihapus';
            header('Location: ../View/index.php');
            exit;
        } else {
            session_start();
            $_SESSION['status'] = 'Produk gagal dihapus. ' . $result;
            header('Location: ../View/tambah.php');
            exit;
        }
    }
}

if ($_GET['head'] == 'add') {
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    $controller = new ProductController();
    $controller->store($name, (int)$stock, (int)$price);
} elseif ($_GET['head'] == 'edit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    $controller = new ProductController();
    $controller->update($id, $name, (int)$stock, (int)$price);
} elseif ($_GET['head'] == 'delete') {
    $id = $_GET['id'];

    $controller = new ProductController();
    $controller->delete($id);
}
