<?php

require_once 'utils.php';

$template = getTwigTemplate('addproduct.html.twig');
echo $template->render();

$test = "hello";

echo $test;
