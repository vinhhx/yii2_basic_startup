<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
$this->params['pageTitle'] = $this->title;
$this->params['pageDescription'] = $message;
?>
<div class="site-error">
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <?php if (YII_DEBUG == 3) : ?>
        <pre><?php print_r($exception); ?></pre>
    <?php endif; ?>
</div>
