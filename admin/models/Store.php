<?php
require_once __DIR__ . '/../config/database.php';

class Store {

    public static function all(){
        $db = Database::connect();

        $res = $db->query("
            SELECT * FROM product_prices
        ");

        $data = [];

        while($row = $res->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    public static function create($product_id, $store, $price, $url){
        $db = Database::connect();

        $db->query("
            INSERT INTO product_prices(product_id, store_name, price, url)
            VALUES($product_id, '$store', '$price', '$url')
        ");
    }
}