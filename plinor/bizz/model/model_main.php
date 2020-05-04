<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 23.05.2019
 * Time: 19:04
 */

class Model_main extends Model
{
    public function model_load($tag,$where)
    {
        $cond='';
        if($tag!=0){
            $cond = "WHERE typ=" . $tag;
        }
        if ($where != 0)
            $cond = "WHERE id=" . $where;
        $result[0] = $this->db->query("SELECT * FROM technic $cond");

        return $result;
    }
}