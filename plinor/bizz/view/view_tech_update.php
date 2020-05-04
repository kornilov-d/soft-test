<?php foreach ($data[0] as $value):?>
<form name="art_change" method="post" action="<?php echo URL_BASE;?>/article/com_change/<?php echo $value['id'];?>">
<article class="article">
    <div class="artic_visual">
        <img src="
                            <?php
        switch($value['typ']){
            case 1: echo URL_BASE."/pic/orig/noutbook.png";break;
            case 2: echo URL_BASE."/pic/orig/proector.png";break;
            case 3: echo URL_BASE."/pic/orig/machine.png";break;
            case 4: echo URL_BASE."/pic/orig/marker.png";break;
        }
        ?>">
    </div>
    <div class="artic_top">
    <h1> <?php echo $value['model_short'];?></h1>
        <div>
            <?php if(isset($_SESSION['RULES'])&&($_SESSION['RULES']>=3)):?>
                <button id = "fa_buttons"><span class ="fas fa-save"></span></button>
            <?php endif;?>
         <?php if(isset($_SESSION['RULES'])&&($_SESSION['RULES']>=4)):?>
            <a href="<?php echo URL_BASE;?>/article/index/<?php echo $value['id'];?>">
                <button id = "fa_buttons"><span class ="fas fa-arrow-circle-left"></span></button>
            </a>
            <?php endif;?>
        </div>
    </div>
    <div class="artic_atten">
        <table>
            <tr>
                <td>Полное название:</td>
                <td><input type="text" class="artic_input" name="mf" value="<?php echo $value['model_full'];?>"></td>
            </tr>
            <tr>
                <td>Короткое название:</td>
                <td><input type="text" class="artic_input" name="ms" value="<?php echo $value['model_short'];?>"></td>
            </tr>
            <tr>
                <td>Инвентарный номер:</td>
                <td><input type="text" class="artic_input" name="iid" value="<?php echo $value['inv_id'];?>"></td>
            </tr>
            <tr>
                <td>Серийный номер:</td>
                <td><input type="text" class="artic_input" name="sid" value="<?php echo $value['serial_id'];?>"></td>
            </tr>
            <tr>
                <td>Место хранения:</td>
                <td><input type="text" class="artic_input" name="stg" value="<?php echo $value['stg_name'];?>"></td>
            </tr>
            <tr>
                <td>Тип техники:</td>
                <td>
                    <select class="artic_input" name="type">
                        <option value="1" <?php if($value['typ']==0): echo 'selected'; endif;?>>Ноутбук</option>
                        <option value="2" <?php if($value['typ']==0): echo 'selected'; endif;?>>Проектор</option>
                        <option value="3" <?php if($value['typ']==0): echo 'selected'; endif;?>>Устройство замера</option>
                        <option value="4" <?php if($value['typ']==0): echo 'selected'; endif;?>>Расходный материал</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Текущее состояние:</td>
                <td>
                    <select class="artic_input" name="work">
                        <option value="0" <?php if($value['model_work']==0): echo 'selected'; endif;?>>Рабочее</option>
                        <option value="1" <?php if($value['model_work']==1): echo 'selected'; endif;?>>Архивное</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Доступное количество:</td>
                <td><input type="number" name="amount" class="artic_input" min="0" value="<?php echo $value['amount'];?>"></td>
            </tr>
        </table>
    </div>
    <hr>
     <h2>Описание</h2>
    <p>
        <textarea name="opt" class="artic_textarea">
    <?php echo $value['model_opt'];?>
        </textarea>
    </p>
    <hr>
    <h2>Примечание</h2>
    <p>
        <textarea name="cond" class="artic_textarea">
    <?php echo $value['model_cond'];?>
        </textarea>
    </p>
</article>
</form>
<?php endforeach;?>



