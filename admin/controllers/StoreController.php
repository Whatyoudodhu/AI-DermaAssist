<?php
require_once __DIR__ . '/../models/Store.php';
require_once __DIR__ . '/../models/Product.php';

class StoreController {

    // PAGE VIEW
    public function page(){
        $products = Product::all();
        include __DIR__ . '/../views/stores.php';
    }

    // GET ALL STORES (API)
    public function index(){
        $data = Store::all();
        echo json_encode($data);
    }

    // ADD STORE (API)
    public function store(){

        $data = json_decode(file_get_contents("php://input"), true);

        Store::create(
            $data['product_id'],
            $data['store'],
            $data['price'],
            $data['url']
        );

        echo "Store added!";
    }
}