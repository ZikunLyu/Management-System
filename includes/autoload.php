<?php
    //autoloader is used to load classes and interfaces whenever it needed
    function autoloader($className) {
        
        $fileName = str_replace('\\', '/', $className) . '.php';
        
        $file = __DIR__ . '/../classes/' . $fileName;
        
        include $file;
    }
    
    //this function is set in PHP and allows us to call the function with the name we've given if it comes across a class that hasn't yet been included
    spl_autoload_register('autoloader');
