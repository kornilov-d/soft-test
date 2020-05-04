<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11.04.2020
 * Time: 14:21
 */

class Model_mail extends Model
{

    public function find_person()
    {

        $result = $this->db->query("SELECT id_user FROM hash WHERE hash='{$_COOKIE["hash"]}'");
        $myresult = mysqli_fetch_row($result);
        if (isset($myresult)) {
            $myresult = $this->db->query("SELECT * FROM users WHERE id='$myresult[0]'");
        }
        $myresult = mysqli_fetch_row($myresult);
        if (isset($myresult)) {
            return $myresult;
        }
    }

    public function search(){
        $searcher = $this->db->real_escape_string($_POST['search']);
        $result=$this->db->query("SELECT id from users where login='$searcher'");
        $result = mysqli_fetch_row($result);
        header("location:".URL_BASE."/mail/dialog/".$result[0]);
    }

       public function find_mess($man){
            $info=array();
            $all_mess=array();

           $me=$this->find_person();

           $info_man=$this->db->query("select * from users where id=$man");
           $info_man=mysqli_fetch_row($info_man);
           $info_me=$this->db->query("select * from users where id=$me[0]");
           $info_me=mysqli_fetch_row($info_me);
           $info[]=$info_man;
           $info[]=$info_me;
           $return[]=$info;


           $left_mess=$this->db->query("select * from message where id_author=$man and id_reader=$me[0]");
           if($me[0]!=$man){
               $right_mess=$this->db->query("select * from message where id_author=$me[0] and id_reader=$man");
                while($row=mysqli_fetch_row($right_mess)){
               $all_mess[]=$row;
                 }}

           while($row=mysqli_fetch_row($left_mess)){
                $all_mess[]=$row;
           }

           for($j=0;$j<count($all_mess);$j++){
           for($i=0;$i<count($all_mess)-1;$i++){
               $wallet=$all_mess[$i+1];
                if($all_mess[$i][5]>$all_mess[$i+1][5]){
                    $all_mess[$i+1]=$all_mess[$i];
                    $all_mess[$i]=$wallet;
                }
           }}

           $return[]=$all_mess;

           return $return;
    }

    public function save_mess($man){
        $author=$this->find_person();
        $mess = $this->db->real_escape_string($_POST['message']);
        $mess=htmlspecialchars($mess);
        $date=time();
        $result=$this->db->query("INSERT INTO message(id_author,id_reader,theme,content,mdate,status) VALUES('{$author[0]}','$man','-','$mess','$date',0)");
        header("location:".URL_BASE."/mail/dialog/".$man);
    }

    public function mess_list(){

        $me=$this->find_person();

        $all_mess=array();
        $dialogs=array();
        $users=array();
        $form_user=array();

        $result=$this->db->query("SELECT DISTINCT id_author, id_reader FROM message where id_author='$me[0]' or id_reader='$me[0]'");
        while($row=mysqli_fetch_row($result)){
            $dialogs[]=$row;
        }

        for($j=0;$j<count($dialogs);$j++){
            for($i=0;$i<count($dialogs)-1;$i++){

                if(($dialogs[$i][0]==$dialogs[$i+1][1])&&($dialogs[$i][1]==$dialogs[$i+1][0])){
                    unset($dialogs[$i]);
                }
            }}


        foreach ($dialogs as $value){
            $myresult=$this->db->query("SELECT * FROM message where (id_author='$value[0]' and id_reader='$value[1]') or (id_author='$value[1]' and id_reader='$value[0]') ORDER by mdate DESC LIMIT 1");
            while($row=mysqli_fetch_row($myresult)){
                $all_mess[]=$row;
            }

            $userresult=$this->db->query("SELECT * FROM users where id='$value[0]' or id='$value[1]'");

            while($row=mysqli_fetch_row($userresult)){
                $users[$row[0]]=$row;
            }
        }

        foreach ($users as $value){
            $form_user[]=$value;
        }


        for($j=0;$j<count($all_mess);$j++){
            for($i=0;$i<count($all_mess)-1;$i++){
                $wallet=$all_mess[$i+1];
                if($all_mess[$i][5]<$all_mess[$i+1][5]){
                    $all_mess[$i+1]=$all_mess[$i];
                    $all_mess[$i]=$wallet;
                }
            }}



        $users=array();

            foreach ($all_mess as $value){
                foreach ($form_user as $ulue){
                    if($ulue[0]==$value[1])
                        $value['aut']=$ulue;
                    if($ulue[0]==$value[2])
                        $value['red']=$ulue;
                }
                $users[]=$value;
            }

        $return[]=$me[0];
        $return[]=$users;

        return $return;
    }

}