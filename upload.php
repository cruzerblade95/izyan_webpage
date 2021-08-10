<?php

    function upload($files, $path){

        $temp = $_FILES[$files]['tmp_name'];
        $name = $_FILES[$files]['name'];
        $nameExt = explode("." , $name);
        $ext = $nameExt[1];
        $dir = $path . "/" . $name;

        if (move_uploaded_file($temp, $dir)){
            return $dir;
        }

    }

?>