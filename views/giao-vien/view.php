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
            'username',
            'ten',
            'ngay_sinh',
            'dia_chi',
            'sdt',
            'ten_lop',
            'ten_mon',
            'ten_role',
//            'trang_thai'
        ],
    ]) ?>

</div>
