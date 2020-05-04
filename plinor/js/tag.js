
function deletepol(self) {
        $( self ).parent().parent().remove();
}

function rollpol(self) {
    if($( self ).parent().parent().find(".ent_field").hasClass("hid"))
      $( self ).parent().parent().find(".ent_field").removeClass("hid");
    else
    $( self ).parent().parent().find(".ent_field").addClass("hid");
}

function new_form(option) {
    var amount=$(".art_man").length;
    switch (option) {
        case 'tech': $(".add_pult").before(" <article class=\"art_man\">" +
            "<div class=\"add_perpult\">\n" +
            "        <img src=\"/plinor/pic/orig/pencil.png\" onclick=\"rollpol(this)\">\n" +
            "        <div>Техника "+amount+"</div>\n" +
            "        <img src=\"/plinor/pic/orig/cancel.png\" onclick=\"deletepol(this)\">\n" +
            "    </div>" +
            " <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Инвентарный номер</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"iid[]\" placeholder=\"ИН\">\n" +
            "        </div>\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Полная модель</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"md[]\" placeholder=\"ПМ\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Короткая модель</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"cm[]\" placeholder=\"КМ\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Серийный номер</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"sid[]\" placeholder=\"СН\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Состояние</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"cond[]\" placeholder=\"Состояние\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Примечание</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"opt[]\" placeholder=\"Примечание\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Название склада</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"storage[]\" placeholder=\"Склад\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Режим</div>\n" +
            "            <select name=\"work[]\">\n" +
            "                <option disabled>Выберите режим</option>\n" +
            "                <option value=\"0\">Архивный</option>\n" +
            "                <option value=\"1\">Рабочий</option>\n" +
            "            </select>\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Резерв</div>\n" +
            "            <select name=\"reserve[]\">\n" +
            "                <option disabled>Выберите режим</option>\n" +
            "                <option value=\"0\">Доступен</option>\n" +
            "                <option value=\"1\">Недоступен</option>\n" +
            "            </select>\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Количество</div>\n" +
            "            <input class=\"ent_ent\" type=\"text\" name=\"amount[]\" value=\"1\" placeholder=\"Количество\">\n" +
            "        </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Тип техники</div>\n" +
            "            <select name=\"type[]\">\n" +
            "                <option disabled>Выберите тип</option>\n" +
            "                <option value=\"1\">Ноутбук</option>\n" +
            "                <option value=\"2\">Проектор</option>\n" +
            "                <option value=\"3\">Устройство замера</option>\n" +
            "                <option value=\"4\">Расходный материал</option>\n" +
            "            </select>\n" +
            "        </div></article>");break;
        case 'user': $(".add_pult").before("<article class=\"art_man\"> " +
            "<div class=\"add_perpult\">\n" +
            "        <img src=\"/plinor/pic/orig/pencil.png\" onclick=\"rollpol(this)\">\n" +
            "        <div>Пользователь "+amount+"</div>\n" +
            "        <img src=\"/plinor/pic/orig/cancel.png\" onclick=\"deletepol(this)\">\n" +
            "    </div>" +
            " <div class=\"ent_field\">\n" +
            "                <div class=\"ent_text\">Имя сотрудника</div>\n" +
            "                <input class=\"ent_ent\" type=\"text\" name=\"r_name[]\" placeholder=\"Имя\">\n" +
            "            </div>\n" +
            "            <div class=\"ent_field\">\n" +
            "                <div class=\"ent_text\">Фамилия сотрудника</div>\n" +
            "                <input class=\"ent_ent\" type=\"text\" name=\"r_surname[]\" placeholder=\"Фамилия\">\n" +
            "            </div>\n" +
            "\n" +
            "            <div class=\"ent_field\">\n" +
            "                <div class=\"ent_text\">Отчество сотрудника</div>\n" +
            "                <input class=\"ent_ent\" type=\"text\" name=\"r_secname[]\" placeholder=\"Отчество\">\n" +
            "            </div>\n" +
            "\n" +
            "            <div class=\"ent_field\">\n" +
            "                <div class=\"ent_text\">Почта сотрудника</div>\n" +
            "                <input class=\"ent_ent\" type=\"text\" name=\"email[]\" placeholder=\"Почта\">\n" +
            "            </div>\n" +
            "\n" +
            "        <div class=\"ent_field\">\n" +
            "            <div class=\"ent_text\">Полномочия сотрудника</div>\n" +
            "            <select name=\"type[]\">\n" +
            "                <option disabled>Выберите полномочия</option>\n" +
            "                <option value=\"0\">Партнёр</option>\n" +
            "                <option value=\"1\">Сотрудник</option>\n" +
            "                <option value=\"2\">Старший сотрудник</option>\n" +
            "                <option value=\"3\">Начальник</option>\n" +
            "                <option value=\"4\">Модератор</option>\n" +
            "                <option value=\"5\">Администратор</option>\n" +
            "            </select>\n" +
            "        </div></article>");break;
    }
}
