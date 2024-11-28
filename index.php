<?php

require_once 'Lib/Livro/Core/ClassLoader.php';
$al = new Livro\Core\ClassLoader;
$al->addNamespace('Livro','Lib/Livro');
$al->register();

require_once 'Lib/Livro/Core/AppLoader.php';
$al = new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->register();

$pagina = new PessoaControl;
$pagina->show($_GET);

if($_GET)
{
    $class = $_GET['class'];

    if(class_exists($class))
    {
        $pagina = new $class;
        $pagina->show();
    }
}