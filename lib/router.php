<?php

class Rout
{

    public function router($url, $controller = [])
    {

        if ($url == $_SERVER['PATH_INFO']) {

            include_once __ROOT__ . '/CONTROLLER/' . $controller[0];
            $contr = new Controller();
            $function = $controller[1];
            $contr->$function();

        }

    }

}