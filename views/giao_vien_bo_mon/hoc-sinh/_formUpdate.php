<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\HocSinh */
/* @var $modelClass app\models\Lop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoc-sinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <!--    --><?php //= $form->field($model, 'ma_lop')->textInput(['value' => \app\models\Lop::findById(\app\models\GiaoVien::findById(Yii::$app->user->id)->ma_lop)->ten_lop]) ?>

    <?= $form->field($model, 'ma_lop')->dropDownList(\yii\helpers\ArrayHelper::map($modelClass, 'id', 'ten_lop')) ?>

    <?= $form->field($model, 'ngay_sinh')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => [
            'class' => 'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sdt_bome')->textInput(['maxlength' => true]) ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
