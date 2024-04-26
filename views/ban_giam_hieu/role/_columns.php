<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\rest\UrlRule;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '1%',
        'header' => 'STT'
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'id',
         'width' => '1%',
         'label' => 'Mã chức vụ'
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_role',
//        'header' => 'Tên chức vụ'
    ],
    [
        'header' => "Hoạt động",
        'width' => '20%',
        'class'=>'\kartik\grid\ActionColumn',
        'buttons' => [
            'view' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-eye" ></i>',Url::toRoute(['role/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xem'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success', 'style' => 'width:30px']);
            },
            'update' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-pen"></i>',Url::toRoute(['role/update', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Sửa'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary', 'style' => 'width:30px']);
            },
            'delete' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-trash"></i>',Url::toRoute(['role/delete', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xoá'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-danger', 'style' => 'width:30px',
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
