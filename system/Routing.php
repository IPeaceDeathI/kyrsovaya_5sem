<?php

class Router
{
    private $pages = array();

    function addRoute($url, $path){
        $this->pages[$url] = $path;
    }

    function route($url){
        // if($url == "/mode" or $url == "/" or $url == "/reg") exit;
        $path = $this->pages[$url];
        $file_dir = "src/".$path;
        $GLOBALS["current_path"] = $path;

        if(file_exists($file_dir)){
            require $file_dir;
        }else{
            die();
        }
    }
}
