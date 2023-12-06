<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
//    [
//        'class' => 'kartik\grid\SerialColumn',
//        'width' => '30px',
//    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'id',
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'username',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten',
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
        'attribute'=>'sdt',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_lop',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_mon',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'ten_role',
//    ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'trang_thai',
//     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'noWrap' => 'true',
        'template' => '{view} {update} {delete}',
        'vAlign' => 'middle',
//        'urlCreator' => function($action, $model, $key, $index) {
////            \yii\helpers\VarDumper::dump(Url::to([$action,'id'=>$key,]));
////            exit();
//            return Url::to([$action,'id'=>$key]);
//        },
        'buttons' => [
            'view' => function ($url, $model, $key){
              return Html::a('<i class="fa fa-edit"></i>',Url::toRoute(['giao-vien/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'View'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success']);
            },
            'update' => function ($url, $model, $key){
                return Html::a('<i class="fa fa-pen" ></i>',Url::toRoute(['giao-vien/update', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Update'), 'data-toggle' => 'tooltip',  'class' => 'btn btn-sm btn-outline-primary']);
            },
//            'view' => function ($url, $model, $key){
//                return Html::a('<i class="fa fa-edit"></i>',Url::toRoute(['giao-vien/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'View'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success']);
//            },
        ],
//        'viewOptions' => ['role' => 'modal-remote', 'title' => Yii::t('yii2-ajaxcrud', 'View'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success'],
//        'updateOptions' => ['role' => 'modal-remote', 'title' => Yii::t('yii2-ajaxcrud', 'Update'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary'],
//        'deleteOptions' => ['role' => 'modal-remote', 'title' => Yii::t('yii2-ajaxcrud', 'Delete'), 'class' => 'btn btn-sm btn-outline-danger',
//            'data-confirm' => false,
//            'data-method' => false,// for overide yii data api
//            'data-request-method' => 'post',
//            'data-toggle' => 'tooltip',
//            'data-confirm-title' => Yii::t('yii2-ajaxcrud', 'Delete'),
//            'data-confirm-message' => Yii::t('yii2-ajaxcrud', 'Delete Confirm') ],
    ],
//    [
//        'header' => 'Xem',
//        'value' => function($data) {
//            return Html::a('<i class="fa fa-edit"></i>',Url::toRoute(['giao-vien/view', 'id' => $data->id]), ['role' => 'modal-remote', 'data-toggle' => 'tooltip']);
//        },
//        'format' => 'raw',
//        'headerOptions' => ['width' => '3%', 'class' => 'text-center text-primary'],
//        'contentOptions' => ['class' => 'text-center']
//    ],

];
