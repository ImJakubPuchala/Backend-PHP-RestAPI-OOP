<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");

require_once("../Model/product.php");
require_once("../Controller/database.php");
require_once("../Model/products.php");

//SELECT DATA FROM DB
if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(!isset($_GET['id'])){
        $products = new products();
        $products->SelectAll();
    }else{
        $products = new products();
        $products->Select($_GET['id']);
    }
    
}

// INSERT DATA
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // CHECK IS SET VARIABLES 
    if($_POST['name']){
       $name = $_POST['name']; 
    }
    if($_POST['price']){
        $price = $_POST['price'];
    }
    if($_POST['comments']){
        $comments = $_POST['comments'];
    }
    //insert
    $products = new products();
    $products->Insert($name, $price, $comments);
}

// DELETE DATA
if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    if($_POST['id']){
        $id = $_POST['id'];
    }

    $products = new products();
    $products->Delete($id);
}

// UPDATE DATA
if($_SERVER['REQUEST_METHOD'] == "PUT"){
    if($_POST['name']){
       $name = $_POST['name']; 
    }
    if($_POST['price']){
        $price = $_POST['price'];
    }
    if($_POST['comments']){
        $comments = $_POST['comments'];
    }

    if($_POST['id']){
        $id = $_POST['id'];
    }

    $products = new products();
    $products->Update($id, $name, $price, $comments);
}

?>