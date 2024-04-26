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
    ],
         [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'id',
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_lop',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_sinh',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dia_chi',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'sdt_bome',
    ],    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'toan',
    ],    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tieng_viet',
    ],    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tieng_anh',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ghi_chu',
     ],
    [
        'header' => "Hoạt động",
        'width' => '20%',
        'class'=>'\kartik\grid\ActionColumn',
        'buttons' => [
            'view' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-eye" ></i>',Url::toRoute(['hoc-sinh/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xem'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success', 'style' => 'width:30px']);
            },
            'update' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-pen"></i>',Url::toRoute(['hoc-sinh/update', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Sửa thông tin học sinh'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary', 'style' => 'width:30px']);
            },

            'delete' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-trash"></i>',Url::toRoute(['hoc-sinh/delete', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xoá'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-danger', 'style' => 'width:30px',
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
