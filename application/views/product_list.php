<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body{
            font-family:Verdana;
            font-size:18px;
        }
        .main{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        table{
            border:1px solid #dddddd;
            padding:15px;
            background:#f7f7f7;
        }
        table tr td{
            padding:5px 10px;
            border: 1px solid #ddd;
            min-width:150px;
        }
    </style>
</head>
<body>
    <div class="main">
        <h2>Product List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Volume</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product){ ?>
                    <tr>
                        <td><?php echo $product['id'];?></td>
                        <td><?php echo $product['product_name'];?></td>
                        <td><?php echo $product['product_volume'];?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pages">
            <?php for($i=1; $i<=$total_page; $i++){ ?>
                <a href="<?php echo $_ENV['BASE_URL'];?>product/?p=<?php echo $i;?>"><?php echo $i;?></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>