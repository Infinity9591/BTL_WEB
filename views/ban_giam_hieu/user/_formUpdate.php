<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelRole app\models\Role */


?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['value' => ""]) ?>

    <?= $form->field($model, 'ma_role')->dropDownList(\yii\helpers\ArrayHelper::map($modelRole, 'id', 'ten_role'))?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Còn hoạt động',
        '0' => 'Không hoạt động'
    ])?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
