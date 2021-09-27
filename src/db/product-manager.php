<?php

namespace ProductManager;

use Product;

require_once __DIR__ . '/../model/Product.php';
include_once "db-connection.php";

function createProduct(Product $product)
{
    $link = getConnection();
    createProductsTableIfNotExist($link);

    $sku = $product->sku;
    $name = $product->name;
    $price = $product->price;
    $type = $product->type;
    $size = $product->size;
    $height = $product->height;
    $width = $product->width;
    $length = $product->length;
    $weight = $product->weight;

    $query = "INSERT INTO products(sku, name, price, type, size, height, width, length, weight) 
    VALUES('" . $sku . "', 
            '" . $name . "', 
            '" . $price . "',
            '" . $type . "',
            '" . $size . "',
            '" . $height . "',
            '" . $width . "',
            '" . $length . "',
            '" . $weight . "')
            ;";

    mysqli_query($link, $query);
    mysqli_close($link);
}

function getProducts(): array
{
    $products = array();

    $link = getConnection();
    $query = "SELECT * FROM id17080106_swdb.products;";
    $result = mysqli_query($link, $query);

    while ($data = mysqli_fetch_array($result, MYSQLI_NUM)) {
        array_push($products, Product::fromDataArray($data));
    }

    mysqli_close($link);
    return $products;
}

function createProductsTableIfNotExist($link)
{
    $query = "CREATE TABLE IF NOT EXISTS `products` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR (45) NOT NULL,
    `name` VARCHAR (45) NOT NULL,
    `price` DECIMAL(13, 2) NOT NULL,
    `type` TEXT NOT NULL,
    `size` INT NOT NULL,
    `height` INT(10) NOT NULL,
    `width` INT(10) NOT NULL,
    `length` INT(10) NOT NULL,
    `weight` INT(10) NOT NULL,
    PRIMARY KEY (id));";
    mysqli_query($link, $query);
}

function skuExists($sku): bool
{
    $link = getConnection();
    createProductsTableIfNotExist($link);
    $query = "SELECT * FROM id17080106_swdb.products WHERE sku='$sku'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return true;
    }
    mysqli_close($link);
    return false;
}
