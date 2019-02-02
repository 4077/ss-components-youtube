<?php namespace ss\components\youtube\ui\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function reload()
    {
        $this->c('<:reload', [], true);
    }
}
