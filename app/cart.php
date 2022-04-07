<?php 
namespace App;
class Cart{
    public $products =  null;
    public $totalPrice = 0;
    public $totalQuanty = 0;
    public function _constant($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    public function AddCart($product,$id){
        $newProduct = ['quanty'=>0,'price'=>$product->money,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id, $products))
            {
                $newProduct = $products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty']* $product->money;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->money;
         $this->totalQuanty++;
    }

}
?>