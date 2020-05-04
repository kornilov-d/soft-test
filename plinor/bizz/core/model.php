<?php
class Model
{

    var $db=NULL;
    function __construct()
    {
        $this->db = new MySQL("localhost", "root","root","plinor");
        $this->db->set_charset("utf8");
    }
}