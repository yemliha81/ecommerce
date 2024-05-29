<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepetim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <?php
    //echo "<pre>";
    //print_r($_SESSION['cart']);?>

    <h3>Sepetim</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($_SESSION['cart'] as $item){ ?>
                <tr>
                    <td><?= $item['title'] ?></td>
                    <td></td>
                    <td>
                        <a href="javascript:;" class="reduceCart" pro_id="<?= $item['id']?>">-</a> 
                        <?= $item['qty'] ?> 
                        <a href="javascript:;" class="addToCart" pro_id="<?= $item['id']?>">+</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>    
    </div>

<script>
     $('.addToCart').click(function(){
        const id = $(this).attr('pro_id');
        const title = $(this).attr('title');

        $.ajax({
            type: "POST",
            url: "/Controller/CartController.php",
            data: { 'id':id, 'process':'addToCart' },
            success: function(response){
                console.log(response);
                location.reload();
            }
        })

    })

    $('.reduceCart').click(function(){
        const id = $(this).attr('pro_id');

        $.ajax({
            type: "POST",
            url: "/Controller/CartController.php",
            data: { 'id':id, 'process':'reduceCart' },
            success: function(response){
                console.log(response);
                location.reload();
            }
        })

    })
</script>
</body>
</html>