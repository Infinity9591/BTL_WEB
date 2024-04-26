<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HocSinh */
/* @var $modelClass app\models\Lop */

?>
<div class="hoc-sinh-create">
    <?= $this->render('_formCreate', [
        'model' => $model,
        'modelClass' => $modelClass,
    ]) ?>
</div>
