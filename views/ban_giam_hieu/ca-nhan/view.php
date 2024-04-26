<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\GiaoVien $model */

$this->title = 'Thông tin cá nhân';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin cá nhân', 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="giao-vien-ca-nhan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Sửa lại thông tin', ['update-ca-nhan', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ten',
            'ngay_sinh',
            'dia_chi:ntext',
            'sdt'
        ],
    ]) ?>

</div>
