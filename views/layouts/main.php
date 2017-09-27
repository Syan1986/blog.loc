<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">1</span>
                    <span class="icon-bar">2</span>
                    <span class="icon-bar">3</span>
                </button>
            </div>

             <?= Menu::widget([
                 'items' => [
                     ['label' => 'Главная', 'url' => ['/']],
                     ['label' => 'Админка', 'url' => ['/admin']],
                     ['label' => 'Меню',
                         'url' => ['#'],
                         'options'=>['class'=>'dropdown'],
                         'template' => '<a href="{url}" class="url-class">{label}</a>',
                         'items' =>
                             [
                             ['label' => 'под меню 1', 'url' => ['#']],
                             ['label' => 'под меню 2', 'url' => ['#']],
                             ['label' => 'под меню 3','url' => ['#']],
                             ['label' => 'Меню',
                                     'url' => ['#'],
                                     'options'=>['class'=>'dropdown'],
                                     'template' => '<a href="{url}" class="url-class">{label}</a>',
                                     'items' => [
                                         ['label' => 'под меню 1', 'url' => ['#']],
                                         ['label' => 'под меню 2', 'url' => ['#']],
                                         ['label' => 'под меню 3','url' => ['#']]
                                     ]
                             ]
                            ]
                     ]
                     ],
                 'submenuTemplate' => "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n",
             ]); ?>
                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">
                        <?php if(Yii::$app->user->isGuest):?>
                            <li><a href="<?= Url::toRoute(['auth/login'])?>">Login</a></li>
                            <li><a href="<?= Url::toRoute(['auth/signup'])?>">Register</a></li>
                        <?php else: ?>
                            <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->name . ')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif;?>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<?= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
