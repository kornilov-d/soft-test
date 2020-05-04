<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11.04.2020
 * Time: 14:19
 */

class Controller_mail extends Controller
{
    var $model_mail=NULL;
    public function __construct($way)
    {
        parent::__construct($way);
        $this->model_mail = new Model_mail();
    }

    function action_search(){
        $this->model_mail->search();
    }

    function action_send(){

        $man=$this->way[4];
        $this->model_mail->save_mess($man);
    }

    function action_dialog()
    {
        $data['user']=$this->way[4];
        $data['mess']=$this->model_mail->find_mess($data['user']);
        $this->view->generate('view_dialog.php', 'view_form.php',$data);
    }

    function action_index()
    {
        $data=$this->model_mail->mess_list();
        $this->view->generate('view_mail.php', 'view_form.php',$data);
    }
}