<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuanLyHocSinh */
?>
<div class="hoc-sinh-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ten_lop',
            'ngay_sinh',
            'dia_chi',
            'sdt_bome',
            'toan' ,
            'tieng_viet' ,
            'tieng_anh' ,
            'xep_loai' ,
            'ghi_chu',
        ],
    ]) ?>

</div>
