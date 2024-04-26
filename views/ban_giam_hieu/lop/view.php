<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuanLyLop */
?>
<div class="lop-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_lop',
            'so_hoc_sinh'
        ],
    ]) ?>

</div>
