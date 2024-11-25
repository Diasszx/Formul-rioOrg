<?php

abstract class Record
{
    protected $data;
    public function __set($prop, $value)
    {
         if ($value === NULL)
         {
            unset($this->data[$prop]);
         }
         else
         {
            $this->data[$prop] = $value;
         }
    }

    public function __get($prop)
    {
        if(isset($this->data[$prop]))
        {
            return $this->data[$prop];
        }
    }

    public function __isset($prop)
    {
        return isset($this->data[$prop]);
    }
}

