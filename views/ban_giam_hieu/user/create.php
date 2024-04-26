<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $modelRole app\models\Role */


?>
<div class="user-create">
    <?= $this->render('_form', [
        'model' => $model,
        'modelRole' => $modelRole,
    ]) ?>
</div>
