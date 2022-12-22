<?php

function view(string $routeName, array $data = []): void
{
    extract($data, EXTR_SKIP);
    require  __DIR__."/../views/$routeName.php";
}

function getPdo()
{

}

function getConfig() :array
{
    return [

    ];
}
