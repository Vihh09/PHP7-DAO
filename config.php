<?php

spl_autoload_register(function ($class_name) {//essa função faz com que seja possivel navegar e escolher uma classe dentro de um arquivo
   $filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";
   if (file_exists(($filename))) {
       require_once ($filename);
   }
});