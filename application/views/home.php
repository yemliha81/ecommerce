<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body{
            font-family:Verdana;
            font-size:18px;
        }
        .main{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            align-items:center;
            justify-content:center;
            gap:20px;
        }
        .product{
            border: 1px solid #DDD;
            padding:10px;
            border-radius:10px;
        }
        
    </style>
</head>
<body>
    <div >
        <h2>Product List</h2>
        <div class="main">
            <?php foreach($products as $item){ ?>
                <div class="product">
                    <div><img src="https://place-hold.it/200x200/f9b6b6/ffffff?text=Product image" width="100%"></div>
                    <div><?=$item['title']?></div>
                    <div><?=$item['price']?></div>
                    <div><a href="javascript:;" class="addToCart" pro_id="<?=$item['id']?>" title="<?=$item['title']?>">Sepete Ekle</a></div>
                </div>
            <?php } ?>
        </div>
        
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('.addToCart').click(function(){
        const pro_id = $(this).attr('pro_id');
        const title = $(this).attr('title');

        $.ajax({
            type: "POST",
            url: "<?php echo ADD_TO_CART;?>",
            data: {'pro_id': pro_id, 'title':title },
            success: function(response){
                console.log(response);
            }
        })


    })
</script>
</html>