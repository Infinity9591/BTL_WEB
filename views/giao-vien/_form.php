<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GiaoVien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="giao-vien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->textInput() ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_mon')->textInput() ?>

    <?= $form->field($model, 'ma_lop')->textInput() ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
