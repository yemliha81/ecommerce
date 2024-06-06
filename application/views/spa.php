<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page Application</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>

<h1 class="page_title">SPA</h1>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody class="tbody">
      
    </tbody>
</table>

<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Product</h4>
      </div>
      <div class="modal-body">
        <form id="pro_update_form" onsubmit="return false">
            <div>
                <label for="">Product Name</label>
                <input type="text" name="name" class="form-control pro_name" >
            </div>
            <div>
                <label for="">Product Description</label>
                <input type="text" name="description" class="form-control pro_description" >
            </div>
            <div>
                <label for="">Product Price</label>
                <input type="text" name="price" class="form-control pro_price" >
            </div>
            <div style="margin-top:10px;">
                <p>
                    <button class="btn btn-success save">SAVE</button>
                </p>
            </div>
            <input type="hidden" name="id" class="pro_id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    //sayfa ilk yüklendiğinde çalışacak fonksiyon

    $(document).ready(function(){
        get_products();
    })

    function get_products(){
        $.ajax({
            method: "GET",
            url: "<?php echo $_ENV['BASE_URL'];?>backend/get_products_2",
            success: function(response){
                //console.log(response)
                const products = JSON.parse(response);
                //console.log(products)

                products.forEach(function(item){
                    $('.page_title').html('Product List')
                    console.log(item);
                    const table_row = '<tr pro_id="'+item.id+'">\
                                            <td>'+item.product_name_tr+'</td>\
                                            <td>'+item.description_tr+'</td>\
                                            <td>'+item.price+'</td>\
                                            <td>\
                                                <a class="btn btn-sm btn-info update_product" data-toggle="modal" data-target="#myModal">Update</a>\
                                                 <a class="btn btn-sm btn-danger delete_product">Delete</a>\
                                            </td>\
                                        </tr>';
                    $('.tbody').append(table_row);
                })



            }
        })
    }

    //$('.update_product').click(function)

    $(document).on('click', '.update_product', function(){
        const pro_id = $(this).parent().parent().attr('pro_id');
        //alert(pro_id);

        $.ajax({
            method: "GET",
            url: "<?php echo $_ENV['BASE_URL'];?>backend/get_product/"+pro_id,
            success: function(response){
                //console.log(response);
                const product = JSON.parse(response);
                $('.pro_name').val(product.product_name_tr);
                $('.pro_description').val(product.description_tr);
                $('.pro_price').val(product.price);
                $('.pro_id').val(product.id);
            }
        })


    })

    $('.save').click(function(){
        const form_data = $('#pro_update_form').serialize();
        console.log(form_data);

        $.ajax({
            method: "POST",
            url:"<?php echo $_ENV['BASE_URL'];?>backend/update_product",
            data: form_data,
            success: function(response){
                console.log(response)
                if(response == "success"){
                    //alert("Product update successful!");
                    //location.reload();
                    $('.tbody').html('');
                    get_products();
                }else{
                    alert("Error");
                }
            }
        })

    })




</script>

</body>
</html>