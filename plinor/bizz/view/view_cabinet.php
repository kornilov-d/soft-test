<form name="addform" method="post" action="<?php echo URL_BASE."/cabinet/save/".$data['person'][0];?>" enctype="multipart/form-data">
<article>
    <div class="cab_profile row">
    <img src="<?php echo URL_BASE."/".$data['person'][8];?>" class="cab_avatar">
    <div class="cab_info">
        <input type="text" class="cab_fio" name="r_surname" placeholder="Фамилия" value="<?php echo $data['person'][4];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
        <input type="text" class="cab_fio" name="r_name" placeholder="Имя" value="<?php echo $data['person'][3];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
        <div class="cab_io">
            <input type="text" class="cab_fio" name="r_secname" placeholder="Отчество" value="<?php echo $data['person'][5];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
        </div>
        <div class="cab_full row">
            <i id = "cab_icon" class="fas fa-user-alt"></i>
            <?php if(($data['settings']==1)&&($data['profile'][7]>3)):?>
                <select name="mode">
                    <option value="0" <?php if($data['person'][7]==0): echo 'selected'; endif;?>>Партнёр</option>
                    <option value="1" <?php if($data['person'][7]==1): echo 'selected'; endif;?>>Сотрудник</option>
                    <option value="2" <?php if($data['person'][7]==2): echo 'selected'; endif;?>>Старший сотрудник</option>
                    <option value="3" <?php if($data['person'][7]==3): echo 'selected'; endif;?>>Начальник</option>
                    <option value="4" <?php if($data['person'][7]==4): echo 'selected'; endif;?>>Модератор</option>
                    <option value="5" <?php if($data['person'][7]==5): echo 'selected'; endif;?>>Администратор</option>
                </select>
            <?php else:
                switch($data['person'][7]){
                    case 0: $role="Партнёр";break;
                    case 1:  $role="Сотрудник";break;
                    case 2:  $role="Старший сотрудник";break;
                    case 3: $role="Начальник";break;
                    case 4:  $role= "Модератор";break;
                    case 5:  $role="Администратор";break;
                }
                ?>
                <input type="text" value="<?php echo $role?>" readonly>
                <input type="text" class="unvis" name="mode" value="<?php echo $data['person'][7];?>" readonly>
            <?php endif;?>
        </div>
        <div class="cab_full row">
            <i id = "cab_icon" class="fas fa-envelope"></i>
            <input type="text" name="mail" value="<?php echo $data['person'][6];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
        </div>
        <div class="cab_full row">
            <i id = "cab_icon" class="fas fa-at"></i>
            <input type="text" name="login" value="<?php echo $data['person'][1];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
        </div>

        <?php if($data['settings']!=0):?>

            <div class="cab_full row">
                <i id = "cab_icon" class="fas fa-eye" onclick="cab_vis(this,1)"></i>
                <p class="cab_pus">Пароль</p>
                <input type="text" name="password" class="cab_puss unvis" value="<?php echo $data['person'][2];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
            </div>

        <div class="cab_full row">
            <i id = "cab_icon" class="fas fa-file-upload"></i>

        <label for="files" >Загрузить файл</label>
        </div>

        <div class="cab_full row">
            <img src="<?php echo URL_BASE;?>/pic/orig/cancel.png" id="cross" class="cab_icon unvis" onclick='cross()'>
            <input type="text" class="unvis" id="cab_file" readonly>
        <input id="files" class="unvis" value="" type="file" name="avatar" onchange="file_name(id)">
        </div>

        <?php endif; ?>

    </div>
    <div class="cab_settings">
        <?php if($data['settings']==0):?>
        <a href="<?php echo URL_BASE."/cabinet/change/".$data['person'][0]?>"><div class="cab_full row">
                <i id = "cab_icon" class="fas fa-user-edit"></i>
            <p>Изменить профиль</p>
        </div>
        </a>
        <div class="cab_full row">

            <i id = "cab_icon" class="fas fa-eye" onclick="cab_vis(this,0)"></i>
            <p class="cab_pus">Пароль</p>
            <input type="text" name="password" class="cab_puss unvis" value="<?php echo $data['person'][2];?>" <?php if($data['settings']==0):?>readonly<?php endif;?>>
        </div>
        <?php else:?>
        <div class="cab_full row">
            <i id = "cab_icon" class="fas fa-save"></i>
            <input type="submit" name="submit" value="Сохранить изменения">
        </div>
        <a href="<?php echo URL_BASE;?>/cabinet/view"><div class="cab_full row">
                <i id = "cab_icon" class="fas fa-arrow-alt-circle-left"></i>
            <p>Отмена</p>
            </div></a>
        <?php endif;?>
    </div>
    </div>

   <!-- <div>
        <p class="cab_his cab_fio">Последняя активность</p>
    <div class="cab_history">
        У вас нет ранее бронированной техники
    </div>
    </div> -->

</article>
</form>