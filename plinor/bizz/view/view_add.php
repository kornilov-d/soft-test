<article class="article">
    <div class="artic_visual">
        <img src="/plinor/pic/orig /machine.jpg">
    </div>
    <h1>Редактура</h1>
    <hr>
    <p class="attention">
        Осторожно! Ваша статья может и будет рассмотрена модератарами.
        Без этого ваша работа не попадёт на сайт,
        поэтому будьте внимательны и пишите только обдуманный материал.
        За нецензурную лексику и статьи, нарушающие правила сообщества, может последовать бан вашего профиля.
    </p>
    <form class="textarea" enctype="multipart/form-data" method="post" action="/plinor/add/work/<?=$data[0]?>">
        <input type="text" name="h1" value="<?= $data[2]; ?>" placeholder="Введите заголовок страницы">
        <label for="files" class="vis_but">Загрузить файл</label>
        <ul class="file_info">
            <li id="file_readonly">
                <input type="text" style="display: none;" id="file_desc" readonly>
            </li>
            <li>
                <div class='crest' id="cross" style="display: none;" onclick='cross()'></div>
            </li>
        </ul>
        <input id="files" style="display: none;" value="<?= $data[4]; ?>" type="file" name="wallpaper"
               onchange="file_name(id)">
        <ul>
            <li> Теги</li>
            <li>
                <ul class="tag_ul">
                    <?foreach ((array)$data[5] as $value):?>
                        <li class='tag'>
                            <div class="tag_text"><input type='text' class="news_tags" name="tagt[]"
                                                         value="<?= $value ?>" placeholder='Тег'></div>
                            <div class='crest' onclick='deletpol(this)'></div>
                        </li>
                    <? endforeach; ?>
                    <li class='tag'>
                        <div class="tag_text"><input type='text' class="news_tags" name="tagt[]" value="" placeholder='Тег'>
                        </div>
                        <div class='crest' onclick='deletpol(this)'></div>
                    </li>
                </ul>
            </li>
            <li id="plust" class="plus" onclick="add('t')"></li>
        </ul>
        <textarea class="new_art" id="main_text" name="content" placeholder="Статью стоит писать сюда"><?= $data[3]; ?></textarea>
        <input class="vis_but" type="submit" name="move" value="Отправить">
        <!--<ul>
            <li><div onclick="h1_art()">Загаловок</div></li>
            <li><div>Добавить обложку</div>
            <input type="file" style="display: none">
            </li>
            <li><div onclick="p_art()">Новый абзац</div></li>
            <li><div>Добавить картинку</div></li>
        </ul>-->
    </form>
</article>