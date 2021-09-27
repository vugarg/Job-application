<?php

require_once __DIR__ . '/db/db-connection.php';
require_once __DIR__ . '/db/product-manager.php';
require_once 'utils.php';

if (isPost()) {
    handlePost();
}

function handlePost()
{
    $link = getConnection();
    $id = $_POST['delete-checkbox'];


    foreach ($id as $item) {
        $query = "DELETE FROM products WHERE id = $item;";
        mysqli_query($link, $query);
    }

    header("Location: https://stylolitic-permissi.000webhostapp.com/index.php");
    exit();
}
