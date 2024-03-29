<?php

function basePath($path = '')
{
    return __DIR__ . "/" . $path;
}

function loadView($name)
{
    $path = basePath("views/{$name}.view.php");
    if (file_exists($path)) {
        require $path;
    } else {
        echo "View $name not found";
    }
}

function loadPartial($name)
{
    $path = basePath("views/partials/{$name}.php");
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Partial $name not found";
    }
}

function dump($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit;
}