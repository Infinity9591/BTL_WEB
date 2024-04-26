<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BangDiemTiengViet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoc-sinh-form-tieng-viet">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diem_giua_ky_1')->textInput() ?>
    <?= $form->field($model, 'diem_cuoi_ky_1')->textInput() ?>
    <?= $form->field($model, 'diem_giua_ky_2')->textInput() ?>
    <?= $form->field($model, 'diem_cuoi_ky_2')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
