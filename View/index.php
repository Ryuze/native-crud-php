<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
        <ul>
            <li><a href="./tambah.php">Tambah produk</a></li>
        </ul>
    </div>

    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Option</th>
            </thead>
            <tbody>
                <?php
                include_once(__DIR__ . '/../Model/Product.php');
                use Model\Product;

                $model = new Product();
                $result = $model->getAllProduct();
                while ($data = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $data['id'] . '</td>';
                    echo '<td>' . $data['name'] . '</td>';
                    echo '<td>' . $data['stock'] . '</td>';
                    echo '<td>' . $data['price'] . '</td>';
                    // echo "<td><a href='./edit.php?id=$data[id]'>Edit</a><a href='./delete.php?id=$data[id]'>Hapus</a></td>";
                    echo "<td>";
                    echo "<a href='./edit.php?id=$data[id]'>Edit</a>";
                    echo "<form action='../Controller/ProductController.php?head=delete&id=$data[id]' method='post'>";
                    echo "<button type='submit'>Hapus</button>";
                    echo "</form>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>