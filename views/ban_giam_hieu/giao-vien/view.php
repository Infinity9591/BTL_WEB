<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuanLyGiaoVien */
?>
<div class="giao-vien-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ten_lop',
            'ten_mon',
            'dia_chi',
            'sdt',
            'ten_role',
            'username',
        ],
    ]) ?>

</div>
