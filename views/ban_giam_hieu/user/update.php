<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $modelRole app\models\Role */

?>
<div class="user-update">

    <?= $this->render('_formUpdate', [
        'model' => $model,
        'modelRole' => $modelRole,
    ]) ?>

</div>
