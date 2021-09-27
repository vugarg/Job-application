<?php

use Twig\TemplateWrapper;

require_once __DIR__ . '/db/db-connection.php';
require_once __DIR__ . '/db/product-manager.php';
require_once 'utils.php';

$template = getTwigTemplate('addproduct.html.twig');

if (isPost()) {
    handlePost($template);
}

function handlePost(TemplateWrapper $template)
{
    $post = postSanitized();

    $sku = $post['sku'];
    $name = $post['name'];
    $price = $post['price'];
    $type = $post['productType'];
    $size = !empty($post['size']) ? $post['size'] : $size = 0;
    $height = !empty($post['height']) ? $post['height'] : $height = 0;
    $width = !empty($post['width']) ? $post['width'] : $width = 0;
    $length = !empty($post['length']) ? $post['length'] : $length = 0;
    $weight = !empty($post['weight']) ? $post['weight'] : $weight = 0;

    if ($result = createFailureTemplate($template, $sku)) {
        echo $result;
    } else {
        createProduct($sku, $name, $price, $type, $size, $height, $width, $length, $weight);

        header("Location: https://stylolitic-permissi.000webhostapp.com/index.php");
        exit();
    }
}

function createProduct($sku, $name, $price, $type, $size, $height, $width, $length, $weight)
{
    $product = new Product(null, $sku, $name, $price, $type, $size, $height, $width, $length, $weight);
    $product = ProductManager\createProduct($product);
}

function createFailureTemplate(TemplateWrapper $template, $sku): ?string
{
    $dataExists = ProductManager\skuExists($sku);
    if ($dataExists) {
        $errorMessage = 'Product with this SKU number already exists! Try again';
    }
    return $errorMessage ? $template->render(['error' => $errorMessage]) : null;
}
