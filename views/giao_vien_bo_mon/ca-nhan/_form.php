<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GiaoVien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="giao-vien-ca-nhan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput() ?>

    <?= $form->field($model, 'ngay_sinh')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => [
            'class' => 'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'sdt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
