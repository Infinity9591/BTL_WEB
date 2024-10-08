<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\User;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <link rel="icon" href="image/download.png">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img(\yii\helpers\Url::to('image/download.png'), ['title' => 'Trường Tiểu học Tân Dương','alt' => '', 'class' => '', 'style' => 'display:inline; vertical-align: top; height:28px;']).' '.Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    $menuItems = [
        'label' => 'Cá nhân',
        'items' => [
            ['label' => 'Thông tin cá nhân', 'url' => ['/giao-vien/update-ca-nhan']],
            ['label' => 'Đổi mật khẩu', 'url' => ['/giao-vien/update-mat-khau']],
            ['label' => 'Đăng xuất', 'url' => ['/site/logout'],  'linkOptions' => ['data-method' => 'post'],],
        ],
    ];

    if (Yii::$app->user->isGuest){ //guest
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
            'items' => [
                ['label' => 'Login', 'url' => ['/site/login']]
            ]
        ]);
    } else if (User::findIdentity(Yii::$app->user->id)->ma_role == 1){ //ban_giam_hieu
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
            'items' => [
                ['label' => 'Trang chủ', 'url' => ['/site/index']],
                ['label' => 'Giáo viên', 'url' => ['/giao-vien/index']],
                ['label' => 'Lớp', 'url' => ['/lop/index']],
                ['label' => 'Chức vụ', 'url' => ['/role/index']],
                ['label' => 'Tài khoản', 'url' => ['/user/index']],
                $menuItems,
            ]
        ]);
    } else if (User::findIdentity(Yii::$app->user->id)->ma_role == 2){ //giao_vien_chu_nhiem
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
            'items' => [
                ['label' => 'Trang chủ', 'url' => ['/site/index']],
                ['label' => 'Quản lí thông tin học sinh', 'url' => ['/hoc-sinh/index']],
                ['label' => 'Quản lí điểm học sinh', 'url' => ['/hoc-sinh/index-mark']],
                $menuItems,

            ]
        ]);
    } else if (User::findIdentity(Yii::$app->user->id)->ma_role == 3){ //giao_vien_bo_mon
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
            'items' => [
                ['label' => 'Trang chủ', 'url' => ['/site/index']],
//                ['label' => 'Quản lí thông tin học sinh', 'url' => ['/hoc-sinh/index']],
                ['label' => 'Quản lí điểm học sinh', 'url' => ['/hoc-sinh/index-mark']],
                $menuItems,
            ]
        ]);
    }

    NavBar::end();
    ?>
</header>


<main id="main" class="flex-shrink-0" role="main" style="margin-top: 100px">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start"> Nhóm 11 </div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::use() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
