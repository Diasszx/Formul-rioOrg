<?php

use Livro\Database\Transaction;
use Livro\Database\Criteria;
use Livro\Database\Repository;
use Livro\Control\Page;

class CidadeControl extends Page
{
    public function listar()
    {
        try
        {
            Transaction::open('livro');

            $criteria = new Criteria;
            $criteria->setProperty('order','id');

            $repository = new Repository('cidade');
            $cidades = $repository->load($criteria);

            if($cidades)
            {
                foreach($cidades as $cidade)
                {
                    print "{$cidade->id} - {$cidade->nome} <br>";
                }
            }

            Transaction::close();
        }
        catch(Exception $e)
        {
            print $e->getMessage();
        }
    }
}