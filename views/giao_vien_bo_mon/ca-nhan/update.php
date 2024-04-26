<?php


use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GiaoVien $model */

$this->title = 'Cập nhật thông tin cá nhân';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin cá nhân'];

?>
<div class="giao-vien-ca-nhan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
