<?php namespace ss\components\youtube\cp\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function updateUrl()
    {
        if ($pivot = $this->unxpackModel('pivot')) {
            $txt = \std\ui\Txt::value($this);

            $embedUrl = $this->getYoutubeEmbedUrl($txt->value);

            ss()->cats->apComponentPivotData($pivot, 'url', $embedUrl);

            $txt->response($embedUrl);

            pusher()->trigger('ss/components/youtube/pivot-' . $pivot->id . '/update_src');
        }
    }

    private function getYoutubeEmbedUrl($url)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "https://www.youtube.com/embed/$2",
            $url
        );
    }
}
