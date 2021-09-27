<?php

function getConnection(): mysqli
{
    $server = "localhost";
    $user = "id17080106_sw_db";
    $password = "Scandi5541636_";
    $database = "id17080106_swdb";

    $link = mysqli_connect($server, $user, $password, $database);

    if (!$link) die("Connection to DB failed: " . mysqli_connect_error());

    return $link;
}
