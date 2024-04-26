<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
?>
<div class="role-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_role',
        ],
    ]) ?>

</div>
