<article class="enter">
    <form method="post" action="<?php echo URL_BASE;?>/enter/action">
        <h1 class = "auth_header">Авторизация</h1>
        <div class="ent_field">
            <label class="ent_text">Логин</label><br>
            <input class="ent_ent" type="text" name="login" placeholder="Сотрудник">
        </div>
        <div class="ent_field">
            <label class="ent_text">Пароль</label><br>
            <input class="ent_ent" type="password" name="password" placeholder="Пароль">
        </div>
        <?php if($data[1]!='n'):?>
        <div class="ent_atten"><?php echo $data[1];?></div>
        <?php endif;?>
        <div class="ent_field">
            <input type="submit" name="submit" value="Вход">
        </div>
    </form>
</article>






