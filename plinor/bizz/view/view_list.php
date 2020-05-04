<article class="list_content">
    <?php
    $counter=0;
    foreach ($data['data'] as $value):
        $counter++;
    if ($data['page']=='user'):?>
    <div class="list_point">
        <div class="list_number list_slot"><?php echo $counter;?></div>
        <div class="list_fio list_slot"><?php echo "$value[4] ".mb_substr($value[3], 0, 1).". ".mb_substr($value[5], 0, 1)."."?></div>
        <div class="list_status list_slot"><?php
            switch($value[7]){
                case 0: echo "Партнёр";break;
                case 1: echo "Сотрудник";break;
                case 2: echo "Старший сотрудник";break;
                case 3: echo "Начальник";break;
                case 4: echo "Модератор";break;
                case 5: echo "Администратор";break;
            }
            ?></div>
        <div class="list_mail list_slot"><?php echo $value[6];?></div>
        <a href="/plinor/cabinet/view/<?php echo$value[0]?>"><div class="list_slot list_profile">Профиль</div></a>
    </div>
    <?php
    elseif($data['page']=='tech'):?>
        <div class="list_point">
            <div class="list_number list_slot"><?php echo$counter;?></div>
            <div class="list_iid list_slot"><?php echo$value[1];?></div>
            <div class="list_cm list_slot"><?php echo$value[3];?></div>
            <div class="list_sd list_slot"><?php echo$value[4];?></div>
            <div class="list_stg list_slot"><?php echo$value[7];?></div>
            <div class="list_work list_slot"><?php
                switch($value[8]){
                    case 0: echo "Рабочий";break;
                    case 1: echo "Архивный";break;
                }
                ?></div>
            <div class="list_reserve list_slot"><?php
                switch($value[9]){
                    case 0: echo "Доступен";break;
                    case 1: echo "Недоступен";break;
                }
                ?></div>
            <div class="list_status list_slot"><?php
                switch($value[12]){
                    case 1: echo "Ноутбук";break;
                    case 2: echo "Проектор";break;
                    case 3: echo "Устройство замера";break;
                    case 4: echo "Расходный материал";break;
                }
                ?></div>
            <a href="<?php echo URL_BASE;?>/article/index/<?php echo $value[0]; ?>"><div class="list_slot list_profile">Профиль</div></a>
        </div>
    <?php else:?>
    <?php
    endif;
    endforeach;?>
</article>