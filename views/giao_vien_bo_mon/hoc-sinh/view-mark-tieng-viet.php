<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BangDiemTiengViet */
?>
<div class="hoc-sinh-view-tieng-viet">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ma_hoc_sinh',
            'diem_giua_ky_1',
            'diem_cuoi_ky_1',
            'diem_giua_ky_2',
            'diem_cuoi_ky_2'
        ],
    ]) ?>

</div>
