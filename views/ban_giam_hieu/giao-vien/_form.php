<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\GiaoVien */
/* @var $modelClass app\models\Lop */
/* @var $modelSubject app\models\MonHoc */
/* @var $modelUser app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="giao-vien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => [
                'class' => 'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_mon')->dropDownList(\yii\helpers\ArrayHelper::map($modelSubject, 'id', 'ten_mon')) ?>

    <?= $form->field($model, 'ma_lop')->dropDownList(\yii\helpers\ArrayHelper::map($modelClass, 'id', 'ten_lop')) ?>

    <?= $form->field($model, 'ma_account')->dropDownList(\yii\helpers\ArrayHelper::map($modelUser, 'id', 'username')) ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
