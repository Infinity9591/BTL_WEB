<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GiaoVien */
/* @var $modelClass app\models\Lop */
/* @var $modelSubject app\models\MonHoc */
/* @var $modelUser app\models\User */

?>
<div class="giao-vien-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelClass' => $modelClass,
        'modelSubject' => $modelSubject,
        'modelUser' => $modelUser
    ]) ?>

</div>
