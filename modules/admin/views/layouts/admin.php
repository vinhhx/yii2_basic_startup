<?php
use yii\helpers\Html;
use app\assets\AdminLteAsset;
/* @var $this yii\web\View */
/* @var $content string */
use yii\helpers\Url;

$this->registerCssFile('/css/admin.css', ['depends' => ['app\assets\AdminLteAsset']]);
$currentController=Yii::$app->controller->id;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">
            <a href="<?= Url::to('/admin'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>SAO</b>KHUE</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Saokhue</b>Consult</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?= isset(Yii::$app->user->identity->username)?Yii::$app->user->identity->username:''; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <p>
                                        <?= isset(Yii::$app->user->identity->username)?Yii::$app->user->identity->username:"" ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= Url::to('/admin/default/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">Menu</li>

                    <li><a href="<?= Url::to(['company/index']); ?>"><i class="fa fa-briefcase"></i> <span>Thông tin website</span></a></li>
                    <li><a href="<?= Url::to(['banner/index']); ?>"><i class="fa fa-file-o"></i> <span>Banner</span></a></li>
                    <li class="treeview <?php echo ($currentController == 'page' || $currentController == 'menu') ? ' active' : '' ?>">
                        <a href="#"><i class="fa fa-newspaper-o"></i> <span>Bài viết</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= Url::to(['posts/category']); ?>"><i class="fa fa-angle-double-right"></i> Danh mục</a></li>
                            <li><a href="<?= Url::to(['posts/index']); ?>"><i class="fa fa-angle-double-right"></i> Bài viết</a></li>
                        </ul>
                    </li>

                    <li class="treeview <?php echo ($currentController == 'admin' || $currentController == 'permission') ? ' active' : '' ?>">
                        <a href="#"><i class='fa fa-gears'></i> <span>Hệ thống</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= Url::to(['user/index']); ?>"><i class="fa fa-angle-double-right"></i> Quản trị viên</a></li>
                            <li><a href="<?= Url::to(['permission/index']); ?>"><i class="fa fa-angle-double-right"></i> Quản lý phân quyền</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?= isset($this->params['pageTitle']) ? Html::encode($this->params['pageTitle']) : null; ?>
                    <small><?= isset($this->params['pageDescription']) ? Html::encode($this->params['pageDescription']) : null; ?></small>
                </h1>
                <?php if (isset($this->params['breadcrumbs']) && is_array($this->params['breadcrumbs'])): ?>
                    <ol class="breadcrumb">
                        <li><a href="<?= Url::to(['default/index']); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                        <?php foreach ($this->params['breadcrumbs'] as $lbl => $url): ?>
                            <?php if ($lbl): ?>
                                <li><?= Html::a($lbl, $url); ?></li>
                            <?php else: ?>
                                <li><?= $url; ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            </section>
            <section class="content">
                <?php
                echo \app\extensions\widgets\Alert::widget();
                echo $content;
                ?>
            </section>
        </div>
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();