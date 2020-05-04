<?php
require_once 'core/mysql.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'uni_function.php';

spl_autoload_register(function ($class) {
    if (!class_exists($class)) {
        $class="bizz/model/".strtolower($class).".php";
        if (file_exists($class))
            require_once $class;
        else {
            Route::ErrorPage404(URL_BASE);
        }
        return true;
    }
});

Route::start($routes);