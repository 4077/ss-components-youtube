<?php namespace ss\components\youtube\ui\controllers;

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
                       'SRC' => ap($pivotData, 'url')
                   ]);

        $this->css();

        $this->widget(':|', [
            '.e' => [
                'ss/components/youtube/pivot-' . $pivot->id . '/update_src' => 'mr.reload'
            ],
            '.r' => [
                'reload' => $this->_abs('>xhr:reload', [
                    'pivot' => $pivotXPack
                ])
            ]
        ]);

        return $v;
    }
}
