<?php
/**
 * Created by PhpStorm.
 * User: vinhhx
 * Date: 09-Oct-15
 * Time: 12:39 AM
 */
namespace app\extensions\widgets\slider;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class NivoSliderWidget extends Widget
{
    public $options;

    public function  init()
    {
        parent::init();
        $this->registerAsset(); //đăng ký js và css

    }

    public function run()
    {
        return $this->render('_view');

    }

    public function  registerAsset()
    {
        $view = Yii::$app->getView();
        $view->registerJsFile('/extensions/js/nivoSlider/jquery.nivo.slider.js', ['depends' => ['Yii\web\YiiAsset']]);
        $view->registerCssFile('/extensions/css/nivoSlider/nivo-slider.css');
        if (isset($this->options["id"]) && !empty($this->options["id"])) {
            $js = <<<EOD
    $("#{$this->options['id']}").nivoSlider();
EOD;
            $view->registerJs($js, View::POS_END);

        }

    }
}