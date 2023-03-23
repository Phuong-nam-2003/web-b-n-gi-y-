<?php
session_start();
require_once '../connection.php';


if (isset($_GET['id'])){
    $id = $_GET['id'];

}
$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
//
$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;

//echo $action;
//echo "<br>";
//echo $id;
//var_dump($action);
//die();
//echo '<pre>';
//print_r($_SESSION['cart']);
////print_r($action);
//print_r($quantity);


//foreach ($quantity AS $q) {
//    if($action == 'update'){
//        $_SESSION['cart'][$id]['quantity'] = $q;
//        var_dump($action);
//    }
//}
//foreach ($_SESSION['cart'] AS $id => $cart_item) {
//    $_SESSION['cart'][$id]['quantity'] = $quantity[$id];
//}
//echo '<pre>';

 $query = mysqli_query($connection,"SELECT * FROM category WHERE id = $id");

if ($query){
    $product = mysqli_fetch_assoc($query);
}
$item=[
    'id'=>$product['id'],
    'name'=>$product['name'],
    'avatar'=>$product['avatar'],
    'gia'=>$product['gia'],
    'quantity'=>$quantity
];

if ($action == 'add'){
   if (isset($_SESSION['cart'][$id])){
     $_SESSION['cart'][$id]['quantity'] += $quantity;
  }else{
       $_SESSION['cart'][$id]= $item;
   }
}

if($action == 'update'){
   $_SESSION['cart'][$id]['quantity'] = $quantity;
}

if ($action == 'delete'){
    unset($_SESSION['cart'][$id]);
}


header("location: giohang.php");


?>