<?php
session_start();

class Cart{

    /*public $total;
    public $noOfProduct;*/
    public $cart;

    public function __construct(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $this->cart = $_SESSION['cart'];
    }

    public function showCart(){
        return $_SESSION['cart'];
    }

    public function addToCart($id, $title=null, $qty=1){

        $cart = $_SESSION['cart'];
        
        $product['id'] = $id;
        $product['qty'] = $qty;
        $product['title'] = $title;

        if(!empty($cart)){
            foreach($cart as $key => $item){
                if($item['id'] == $id){
                    //Sepette qty artırma
                    $cart[$key]['qty'] = $cart[$key]['qty']+1;
                    $_SESSION['cart'] = $cart;
                }else{
                    //Sepet doluyken yeni ürün eklendiğinde çalışacak
                    $_SESSION['cart'][] = $product;
                    
                }
            }

        }else{
            //İlk seferde sepete ekleyen satır
            $_SESSION['cart'][] = $product;
        }

        return true;

    }

    public function reduceQty($id){

        try {
            foreach($_SESSION['cart'] as $key => $item){
                if($_SESSION['cart'][$key]['id'] == $id){
    
                    if($_SESSION['cart'][$key]['qty'] == 1){
                        unset($_SESSION['cart'][$key]);
                    }else{
                        $_SESSION['cart'][$key]['qty'] = $_SESSION['cart'][$key]['qty'] - 1;
                    }
                    
                }
            }
    
            return true;

        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }


        return true;

    }

    public function removeFromCart(){}

    public function emptyCart(){
        unset($_SESSION['cart']);
        return true;
    }
}