<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit produk</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
    ?>
    <div>
        <form action="../Controller/ProductController.php?head=edit" method="post">
            <?php
            include_once(__DIR__ . '/../Model/Product.php');
            use Model\Product;

            $id = $_GET['id'];
            $model = new Product();
            $result = $model->getProduct((int)$id);

            $row = $result->fetch_assoc();

            echo "<input type='hidden' name='id' id='id' value='$row[id]'>";

            echo '<label for="name">Nama produk</label>';
            echo "<input type='text' name='name' id='name' value='$row[name]'>";

            echo '<label for="stock">Stok barang</label>';
            echo "<input type='number' name='stock' id='stock' value='$row[stock]'>";
    
            echo '<label for="price">Harga</label>';
            echo "<input type='number' name='price' id='price' value='$row[price]'>";
            ?>
            <button type="submit">Ubah</button>
        </form>
    </div>
</body>
</html>