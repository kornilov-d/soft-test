<article class="list">

<div class="biggest_soft_new">
    <div class = "tab_head_text">
        <a href="<?php echo URL_BASE."/list/".$data['page'];?>/list" class="list_a">
            <?php if($data['page']!="order"):?>
            Список
        </a>
    </div>
    <div class = "tab_head_icon">
        <a  href="<?php echo URL_BASE."/list/".$data['page'];?>/add" class="list_a">
<!--            <i id = "plus_icon"  class="fas fa-plus-circle"></i>-->
            <?php else:?>
                Заявки
            <?php endif;?>
        </a>
    </div>
</div>
<?php if($data['option']=="list"):
    include "bizz/view/view_list.php";
else:
    include "bizz/view/view_addform.php";
endif;?>
</article>
