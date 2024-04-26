<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'header' => 'STT'
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'id',
         'label'=>'Mã lớp',
         'width' => '1%'
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_lop',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'so_hoc_sinh',
    ],
    [
        'header' => "Hoạt động",
        'width' => '20%',
        'class'=>'\kartik\grid\ActionColumn',
        'buttons' => [
            'view' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-eye" ></i>',Url::toRoute(['lop/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xem'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success', 'style' => 'width:30px']);
            },
            'update' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-pen"></i>',Url::toRoute(['lop/update', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Sửa'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary', 'style' => 'width:30px']);
            },
            'delete' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-trash"></i>',Url::toRoute(['lop/delete', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xoá'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-danger', 'style' => 'width:30px',
                    'data-confirm' => false,
                    'data-method' => false,// for overide yii data api
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => Yii::t('yii2-ajaxcrud', 'Delete'),
                    'data-confirm-message' => Yii::t('yii2-ajaxcrud', 'Delete Confirm')]);
            },
        ]
    ],

];
