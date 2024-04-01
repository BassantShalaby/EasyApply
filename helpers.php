<?php

function basePath($path = '')
{
    return __DIR__ . "/" . $path;
}

function view($name, $data = [])
{
    $path = basePath("App/views/{$name}.view.php");
    if (file_exists($path)) {
        extract($data);
        require $path;
    } else {
        echo "View $name not found";
    }
}

function loadPartial($name , $data = [])
{
    $path = basePath("App/views/partials/{$name}.php");
    if (file_exists($path)) {
        extract($data);
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

function redirect($url)
{
    header("Location: $url");
    exit;
}

function formatSalary($value)
{
    if ($value < 900) {
        $formattedSalary = number_format($value);
        $suffix = '';
    } elseif ($value < 900000) {
        $formattedSalary = number_format($value / 1000);
        $suffix = 'K';
    }

    return $formattedSalary . $suffix;
}



