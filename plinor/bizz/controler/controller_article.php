<?php

class Controller_Article extends Controller
{
    var $model_main = NULL;
    var $model_list = NULL;

    public function __construct($way)
    {
        parent::__construct($way);
        $this->model_main = new Model_main();
        $this->model_list= new Model_list();
    }

    function action_delete(){
        $this->model_list->delete_data('technic',$this->way[START_POSITION + 2]);
    }

    function action_com_change(){
        $this->model_list->update_data('technic',$this->way[START_POSITION + 2]);
        $this->action_index();
    }

    function action_change(){
        $data = $this->model_main->model_load(0,$this->way[START_POSITION + 2]);
        $this->view->generate('view_tech_update.php', 'view_form.php', $data);
    }


    function action_index()
    {
        $data = $this->model_main->model_load(0,$this->way[START_POSITION + 2]);
        $this->view->generate('view_technic.php', 'view_form.php', $data);
    }
}