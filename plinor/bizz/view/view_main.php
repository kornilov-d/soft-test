<!-- <article>
  <!-- <div class="biggest_soft_new">
       Приборная панель по выбору техники и количеству
   </div>
</article> -->

<article class="landing_main">
    <?php foreach ($data[0] as $value):?>
            <div class="soft_news_cont">
                <a href="<?php echo URL_BASE;?>/article/index/<?php echo $value['id']; ?>">
                    <div class="single_new">
                        <div class="single_img">
                            <img src="
                            <?php
                            switch($value['typ']){
                                case 1: echo URL_BASE."/pic/orig/noutbook.png";break;
                                case 2: echo URL_BASE."/pic/orig/proector.png";break;
                                case 3: echo URL_BASE."/pic/orig/machine.png";break;
                                case 4: echo URL_BASE."/pic/orig/marker.png";break;
                            }
                            ?>
                            ">
                        </div>
                        <div class="news_text">
                                <div class="news_tags">
                                    <?php
                                    switch($value['typ']){
                                        case 1: echo "Ноутбук";break;
                                        case 2: echo "Проектор";break;
                                        case 3: echo "Устройство замера";break;
                                        case 4: echo "Расходный материал";break;
                                    }
                                    ?>
                                </div>
                            <div class="news_name">
                                <?php echo $value['model_short']; ?>
                            </div>
                            <div class="news_date">
                                <?php echo $value['stg_name']; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    <?php endforeach; ?>
</article>