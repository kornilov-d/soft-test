<?php

class Controller {

    public $view;
    public $way;
    public $user;

    function __construct($way)
    {
        $this->view = new View();
        $this->way = $way;
    }

}
