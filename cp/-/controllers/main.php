<?php namespace ss\components\youtube\cp\controllers;

class Main extends \Controller
{
    private $pivot;

    public function __create()
    {
        $this->pivot = $this->unpackModel('pivot');

        $this->instance_($this->pivot->id);
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $pivot = $this->pivot;
        $pivotXPack = xpack_model($pivot);

        $pivotData = _j($pivot->data);

        $v->assign([
                       'URL_TXT' => $this->c('\std\ui txt:view', [
                           'path'              => '>xhr:updateUrl',
                           'data'              => [
                               'pivot' => $pivotXPack
                           ],
                           'class'             => 'txt',
                           'emptyContent'      => '...',
                           'fitInputToClosest' => '.input',
                           'content'           => ap($pivotData, 'url')
                       ])
                   ]);

        $this->css();

        return $v;
    }
}
