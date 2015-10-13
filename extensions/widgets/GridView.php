<?php

namespace app\extensions\widgets;

class GridView extends \yii\grid\GridView {

    public $tools;

    public function init()
    {
        $this->layout = '<div class="box box-primary"><div class="box-header with-border">{summary}' .
                        '<div class="box-tools">{tools}</div></div>' .
                        '<div class="box-body no-padding">{items}</div>' .
                        '<div class="box-footer clearfix">{pager}</div></div>';

        $this->pager = [
            'firstPageLabel' => '&laquo;',
            'lastPageLabel' => '&raquo;',
            'nextPageLabel' => '&rsaquo;',
            'prevPageLabel' => '&lsaquo;',
            'options' => [
                'class' => 'pagination pagination-sm no-margin pull-right',
            ]
        ];

        return parent::init();
    }

    public function renderSection($name)
    {
        if ($name == '{tools}') {
            return $this->renderTools();
        } else {
            return parent::renderSection($name);
        }
    }

    protected function renderTools() {
        if ($this->tools) {
            $html = '';
            foreach ($this->tools as $tool) {
                $html .= $tool;
            }
            return $html;
        }
        return null;
    }

}