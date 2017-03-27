<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use app\assets\AppAsset;
use app\models\LeftSide;

AppAsset::register($this);

$brand = LeftSide::getLeft();

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
<body>
<?php $this->beginBody() ?>

<div id="wrapper">
    <div id="header_fix">
        <div class="logo_fix" id="logo_fix1">
            <a href="/"><?= Html::img('@web/img/logo.png')?></a>
        </div>
        <div class="logo_fix" id="logo_fix2">
            <a href="/"><?= Html::img('@web/img/logo1.png')?></a>
        </div>
        <div class="logo_fix" id="logo_fix3">
            <a href="/"><?= Html::img('@web/img/logo2.png')?></a>
        </div>
        <button id="but_collapse_fix" type="button" class="btn" data-toggle="collapse" data-target="#menu_collapse_fix"><strong>menu</strong></button>
        <div id="motivation-fix"><span>No pain - no gain<span></div>
        <div id="menu_collapse_fix" class="collapse">
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">Статьи</a></li>
                <li><a href="#">Корзина</a></li>
                <li><a href="#">Оплата и доставка</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
    </div>

    <div id="header">
        <a href="/"><div class="logo" id="logo1">
            <?= Html::img('@web/img/logo.png')?>
        </div></a>
        <a href="/"><div class="logo" id="logo2">
            <?= Html::img('@web/img/logo1.png')?>
        </div></a>
        <a href="/"><div class="logo" id="logo3">
            <?= Html::img('@web/img/logo2.png')?>
        </div></a>
        <div id="find">
            <input type="text" placeholder="Поиск по сайту">
            <button>Найти</button>
        </div>
        <div id="main_menu">
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">Статьи</a></li>
                <li><a href="#">Корзина</a></li>
                <li><a href="#">Оплата и доставка</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
        <button id="but_collapse" type="button" class="btn glyphicon glyphicon-menu-hamburger" data-toggle="collapse" data-target="#menu_collapse"></button>
        <div id="contact">
            <?= Html::img('@web/img/telephone.png')?>
            <span>8-800-535-35-35</span>
            <span>8(044)-535-35-35</span>
        </div>
        <div id="menu_collapse" class="collapse">
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">Статьи</a></li>
                <li><a href="#">Корзина</a></li>
                <li><a href="#">Оплата и доставка</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
        <div id="register">
            <a href="<?= Yii::$app->urlManager->createUrl("admin"); ?>">Admin</a>
            <?php if(Yii::$app->user->isGuest) : ?>
            <a href="<?= Yii::$app->urlManager->createUrl("signup"); ?>">Регистрация</a>
            <a href="<?= Yii::$app->urlManager->createUrl("login"); ?>">Авторизация</a>
            <?php else : ?>
            <a href="#">Кабинет</a>
            <?=
            Html::a("Logout, " . Yii::$app->user->identity->username,
                ['site/logout'],
                ['data-method'=>'post']);
            ?>
            <?php endif; ?>
        </div>
        <div class="stick-menu">
            <div class="stick-but">
            <div class="stick-letter">
                    <div id="m">M</div>
                    <div id="e">E</div>
                    <div id="n">N</div>
                    <div id="u">U</div>
                </div>
                <div class="stick-arrow as"></div>
            </div>
            <div class="stick-group">
                <ul>
                    <?php foreach ($brand as $key => $brand_name) : ?>
                        <li><a href="<?php $name = strtolower($key);
                                           echo Yii::$app->urlManager->createUrl("categories/$name");?>"><?= Yii::t('app', "$name") ?></a>
                            <div class="brandname">
                                <ul>
                                    <?php foreach($brand_name as $value) :?>
                                        <li><a href="<?php
                                            $name = strToLower(str_replace(' ', '_', $value['brand']));
                                            $type = strToLower(str_replace(' ', '_', $value['type']));
                                            echo Yii::$app->urlManager->createUrl("categories/$type/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="stick-bottom">
                                <div class="stick-triangle">

                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="basket-info"  title="Щёлкните для перехода в корзину"><a href="<?= Yii::$app->urlManager->createUrl("cart/show"); ?>">
        <span id="basket-count"></span>
        <?= Html::img('@web/img/telejka.png', ['id' => 'telejka'])?>
    </a></div>

    <div id="content">
        <?= Alert::widget() ?>
        <?= $this->render('@app/views/layouts/left_side.php', ['brand' => $brand]) ?>
        <div id="product" class="row">
            <?= $content ?>
        </div>
    </div>

    <div id="footer">
        <div id="contact-footer">
            <?= Html::img('@web/img/telephone-footer.png')?>
            <span>0855-535-35-35</span>
            <span>8(044)-535-35-35</span>
        </div>
        <div id="social">
            <div id="vk"><a href="#">vk.com/na-proteine</a></div>
            <div id="linkedin"><a href="#">linkedin.com/na-proteine</a></div>
            <div id="facebook"><a href="#">facebook.con/na-proteine</a></div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
