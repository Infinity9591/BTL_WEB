<?php

use app\models\Lop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $viewModel app\models\QuanLyGiaoVien */
/* @var $lopModel app\models\Lop */
/* @var $monModel app\models\MonHoc */
/* @var $model app\models\GiaoVien */
/* @var $userModel app\models\User */
?>
<div class="giao-vien-update">

    <?=
//    $lopModelData = ArrayHelper::map(Lop::find()->all(), 'id','ten_lop' );
    $this->render('_form_update', [
        'viewModel' => $viewModel,
        'model' => $model,
        'lopModel' => $lopModel,
        'monModel' => $monModel,
        'userModel' => $userModel
    ]) ?>

</div>
