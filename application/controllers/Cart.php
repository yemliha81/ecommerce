<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $this->cart = $_SESSION['cart'];

	}

    public function showCart(){
        return $_SESSION['cart'];
    }

    public function addToCart(){

    
        $post = $this->input->post();

        $id = $post['pro_id'];
        $title = $post['title'];

        $cart = $_SESSION['cart']??[];
        
        $product['id'] = $id;
        $product['qty'] = 1;
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

        //unset($_SESSION['cart']);

        debug($_SESSION['cart']);

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