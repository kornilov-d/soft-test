<?php

class MySQL extends mysqli
{
    public static $request=array();

    public  function query($req,$resultmode = MYSQLI_STORE_RESULT){

        array_unshift(self::$request,$req);
        return parent::query($req);
    }
}