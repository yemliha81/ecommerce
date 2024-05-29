<?php
 include $_SERVER['DOCUMENT_ROOT'].'/Class/Cart.php';
    if($_POST){

        if($_POST['process'] == 'addToCart'){

            $cart = new Cart();
            $cart->addToCart($_POST['id'], $_POST['title'], 1 );
            

            echo "<pre>";
            print_r($cart->showCart());

        }

        if($_POST['process'] == 'reduceCart'){

            $cart = new Cart();
            $cart->reduceQty($_POST['id'], $_POST['title']??null, 1 );
            

            echo "<pre>";
            print_r($cart->showCart());

        }


    }

    if($_GET){

        if($_GET['process'] == 'empty'){

            $cart = new Cart();
            $cart->emptyCart();

            print_r($_SESSION);

        }

    }