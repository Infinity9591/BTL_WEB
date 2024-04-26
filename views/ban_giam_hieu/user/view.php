<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuanLyUser */
?>
<div class="user-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
//            'password',
//            'password_hash',
//            'auth_key',
            'ten',
//            'ten_role',
        ],
    ]) ?>

</div>
