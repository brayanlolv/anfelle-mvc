<?php

    // echo ' atuload loaded';

spl_autoload_register(function ($class_name) {
    //echo $class_name;
    require $class_name . '.php';
    // require $class_name . '.php';
});
