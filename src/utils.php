<?php
require __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

function getTwigEnvironment(): Environment
{
    $loader = new FilesystemLoader(__DIR__ . '/../templates');
    return new Environment($loader);
}

function getTwigTemplate(string $name): TemplateWrapper
{
    return getTwigEnvironment()->load($name);
}

function cleanInput(?string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function postSanitized(): array
{
    foreach ($_POST as $key => $value) {
        $_POST[$key] = cleanInput($value);
    }
    return $_POST;
}

function isPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
