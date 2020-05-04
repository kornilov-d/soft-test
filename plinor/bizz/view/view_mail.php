<article class="mail_art">
    <p>Поиск</p>
    <div class="mail_search">
        <form action="<?php echo URL_BASE;?>/mail/search" method="post">
        <input class="ent_ent mail_ss" type="text" name="search" placeholder="Введите логин сотрудника">
        <input type="submit" name="start_search" value="Перейти к диалогу" class="add_button mail_small">
        </form>
    </div>

    <p>История</p>
   <div class="mail_all">
       <hr>
       <?php for($i=0;$i<count($data[1]);$i++):?>
<?php if($data[0]==$data[1][$i][1]):$flag='red';else:$flag='aut';endif;?>
    <a href="<?php echo URL_BASE;?>/mail/dialog/<?php echo $data[1][$i][$flag][0];?>">
       <div class="mail_dialog">
           <img src="<?php echo URL_BASE."/".$data[1][$i][$flag][8];?>" class="mail_photo">
           <div>
               <div class="row mail_hat">
                   <p><?php echo $data[1][$i][$flag][4]." ".mb_substr($data[1][$i][$flag][3], 0, 1).". ".mb_substr($data[1][$i][$flag][5], 0, 1).". (@".$data[1][$i][$flag][1].")"?></p>
                   <p class="mail_date"><?php if($flag=='red'):echo "(ваше письмо)  "; else: echo "(вам письмо)  "; endif; echo date('H:i:s d.m.y',$data[1][$i][5]);?></p>
               </div>
               <p class="mail_message"><?php echo $data[1][$i][4];?></p>

           </div>
    </div>
    </a>
       <hr>
       <?php endfor;?>



   </div>
</article>