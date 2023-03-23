<?php
require_once '../connection.php';
session_start();

$check = mysqli_query("SELECT * FROM users where `name`,`mobile`,`email` ");
if ($check){
    $product = mysqli_fetch_assoc($check);
}
$item=[

    'name'=>$product['name'],
    'mobile'=>$product['mobile'],
    'email'=>$product['email'],

];
