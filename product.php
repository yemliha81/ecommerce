<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Class/Db.php';
    $id = $_GET['id'];
    $db = new Db();
    $product = $db->read('products', ['id' => $id])[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['title'];?> </title>
    <style>
        .product{
            width:400px;
            border:1px solid #dddddd;
            padding:10px;
            border-radius:10px;
        }
    </style>
</head>
<body>
<div class="product">
    <div>
        
            <img src="https://place-hold.it/250x250" width="100%">
       
    </div>
    <div>
        <?= $product['title']?>
    </div>
    <div>
        <?= $product['price']?>
    </div>
    <div>
        <a href="javascript:;" class="addToCart" pro_id="<?= $product['id']?>" title="<?= $product['title']?>">Sepete Ekle</a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    $('.addToCart').click(function(){
        const id = $(this).attr('pro_id');
        const title = $(this).attr('title');

        $.ajax({
            type: "POST",
            url: "/Controller/CartController.php",
            data: { 'id':id, 'title':title, 'process':'addToCart' },
            success: function(response){
                console.log(response);
            }
        })

    })

</script>
</body>
</html>