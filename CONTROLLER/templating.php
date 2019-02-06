<?php

abstract class Templating{

    public function render($templateName, $variables = [])
    {
        define('TEMPLATE_FOLDER', dirname(__DIR__) . '/VIEW/');
        include TEMPLATE_FOLDER . $templateName . '.php';
    }
}