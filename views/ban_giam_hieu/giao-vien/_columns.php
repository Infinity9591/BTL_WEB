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
         'label' => 'Mã giáo viên',
          'width' => '1%'
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
        'attribute'=>'ten_mon',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dia_chi',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'sdt',
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_sinh',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ten_role',
     ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'username',
    ],
//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'dropdown' => false,
//        'noWrap' => 'true',
//        'template' => '{view} {update} {delete}',
//        'vAlign' => 'middle',
//        'urlCreator' => function($action, $model, $key, $index) {
//            return Url::to([$action,'id'=>$key]);
//        },
//        'viewOptions' => ['role' => 'modal-remote', 'title' => Yii::t('yii2-ajaxcrud', 'View'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success'],
//        'updateOptions' => ['role' => 'modal-remote', 'title' => Yii::t('yii2-ajaxcrud', 'Update'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary'],
//        'deleteOptions' => ['role' => 'modal-remote', 'title' => Yii::t('yii2-ajaxcrud', 'Delete'), 'class' => 'btn btn-sm btn-outline-danger',
//            'data-confirm' => false,
//            'data-method' => false,// for overide yii data api
//            'data-request-method' => 'post',
//            'data-toggle' => 'tooltip',
//            'data-confirm-title' => Yii::t('yii2-ajaxcrud', 'Delete'),
//            'data-confirm-message' => Yii::t('yii2-ajaxcrud', 'Delete Confirm') ],
//    ],

    [
        'header' => "Hoạt động",
        'width' => '20%',
        'class'=>'\kartik\grid\ActionColumn',
        'buttons' => [
            'view' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-eye" ></i>',Url::toRoute(['giao-vien/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xem'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success', 'style' => 'width:30px']);
            },
            'update' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-pen"></i>',Url::toRoute(['giao-vien/update', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Sửa'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary', 'style' => 'width:30px']);
            },
            'delete' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-trash"></i>',Url::toRoute(['giao-vien/delete', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xoá'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-danger', 'style' => 'width:30px',
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
