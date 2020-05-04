<article class="mail_art">

    <p>Сообщения</p>

    <?php $flag=0;?>

    <div class="mail_all">
        <?php for($i=0;$i<count($data['mess'][1]);$i++):?>
        <div class="mail_dialog  <?php if($data['mess'][0][1][0]==$data['mess'][1][$i][1]){ echo 'me'; $flag=1;} else{ $flag=0;}?>">

            <img src="<?php echo URL_BASE."/".$data['mess'][0][$flag][8];?>" class="mail_photo">
            <div>
                <div class="row mail_hat">
                    <p><?php echo $data['mess'][0][$flag][4]." ".mb_substr($data['mess'][0][$flag][3], 0, 1).". ".mb_substr($data['mess'][0][$flag][5], 0, 1).". (@".$data['mess'][0][$flag][1].")"?></p>
                    <p class="mail_date"><?php echo date('H:i:s d.m.y',$data['mess'][1][$i][5]);?></p>
                </div>
                <p class="mail_message"><?php echo $data['mess'][1][$i][4];?></p>

            </div>
        </div>
        <?php endfor;?>

<hr>
        <form action="<?php echo URL_BASE."/mail/send/".$data['user'];?>" method="post" name="send">
            <textarea type="text" class="mail_ss" name="message" placeholder="Примечание">
            </textarea><br>
            <input type="submit" class="add_button mail_small" value="Отправить сообщение">
        </form>
    </div>
</article>