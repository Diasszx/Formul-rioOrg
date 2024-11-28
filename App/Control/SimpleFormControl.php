<?php
use Livro\Control\Page;

class SimpleFormControl extends Page
{
    public function __construct()
    {
        $form = new SimpleForm('my_form');
        $form->setTitle('título');
        $form->addField('Nome', 'nome','text','Maria','form-control');
        $form->addField('Endereço', 'endereco','text','Rua das flores','form-control');
        $form->addField('Telefone', 'telefone','text','(83)95645-2345','form-control');
        $form->setAction('index.php?class=SimpleFormControl&method=');
        $form->show();
    }

    public function onGravar($param)
    {
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }
}  