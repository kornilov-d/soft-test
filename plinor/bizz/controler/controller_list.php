<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 19.11.2019
 * Time: 1:52
 */

class Controller_List extends Controller
{
    var $model_list = NULL;
    public function __construct($way)
    {
        parent::__construct($way);
        $this->model_list = new Model_list();
    }

    function add_elements($table){
        if(isset($this->way[4])){
        if($this->way[4]=='save')
        $this->model_list->add_data($table);}
    }

    function action_tech(){
        $page="tech";
        $table="technic";
        $this->action_index($table,$page);
        $this->add_elements($table);
    }

    function action_user(){
        $page="user";
        $table="users";
        $this->action_index($table,$page);
        $this->add_elements($table);
    }

    function action_order(){
        $page="order";
        $table="oper_it";
        $this->action_index($table,$page);
        $this->add_elements($table);
    }

    function action_index($table,$page)
    {
        $way = $this->way;
        $option = 'list';
        if (isset($way[4])) {
            if ($way[4] == 'add')
                $option = 'add';
        }
        $data['data']=$this->model_list->take_data($table,"");
        $data['page']=$page;
        $data['option']=$option;
        $this->view->generate('view_listadd.php', 'view_form.php', $data);
    }
}