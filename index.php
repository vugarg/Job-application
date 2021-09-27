<?php

require __DIR__ . '/src/utils.php';
require_once __DIR__ . '/src/db/product-manager.php';

$twig = getTwigEnvironment();

$products = ProductManager\getProducts();

// echo $products;

echo $twig->render('index.html.twig', ['products' => $products]);

$test = "hello";

echo $test;
