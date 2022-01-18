<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah produk</title>
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
        <form action="../Controller/ProductController.php?head=add" method="post">
            <label for="name">Nama produk</label>
            <input type="text" name="name" id="name">
    
            <label for="stock">Stok barang</label>
            <input type="number" name="stock" id="stock">
    
            <label for="price">Harga</label>
            <input type="number" name="price" id="price">

            <button type="submit">Tambah</button>
        </form>
    </div>
</body>
</html>