<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $viewModel app\models\QuanLyGiaoVien */
/* @var $lopModel app\models\Lop */
/* @var $monModel app\models\MonHoc */
/* @var $model app\models\GiaoVien */
/* @var $form yii\widgets\ActiveForm */
/* @var $userModel app\models\User */

?>

<div class="giao-vien-form">

    <?php $form = ActiveForm::begin(); ?>
<!--    --><?php // $lopModelData = ArrayHelper::map(Lop::find()->all(), 'id','ten_lop' );?>

<!--    --><?php //= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd'
    ])?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_lop')->dropDownList(  \yii\helpers\ArrayHelper::map($lopModel, 'id', 'ten_lop'))?>

    <?= $form->field($model, 'ma_mon')->dropDownList(  \yii\helpers\ArrayHelper::map($monModel, 'id', 'ten_mon'))?>



    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
