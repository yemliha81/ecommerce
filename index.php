<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Class/Db.php';
    $db = new Db();
    $products = $db->read('products');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .products{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .product{
            border:1px solid #dddddd;
            padding:10px;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <div class="products">
        <?php foreach($products as $product){ ?>
            <div class="product">
                <div>
                    <a href="product.php?id=<?= $product['id']?>">
                        <img src="https://place-hold.it/250x250" width="100%">
                    </a>
                </div>
                <div>
                    <?= $product['title']?>
                </div>
                <div>
                    <?= $product['price']?>
                </div>
                <div>
                    <a href="">Sepete Ekle</a>
                </div>
            </div>
        <?php } ?>
    </div>

</body>
</html>