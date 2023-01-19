<?php

function class_autoload() {
    spl_autoload_register(function($class_name) {
        require('./'.$class_name.'.php');
    });
}
