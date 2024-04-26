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
         'label' => "Mã học sinh"
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten',
        'label' => 'Tên học sinh'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_lop',
        'label' => 'Lớp'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_giua_ky_1_toan',
        'label' => 'Điểm toán giữa kì 1',
        'contentOptions' => [
            'style' => 'color:purple'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_cuoi_ky_1_toan',
        'label' => 'Điểm toán cuối kì 1',
        'contentOptions' => [
            'style' => 'color:purple'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_giua_ky_2_toan',
        'label' => 'Điểm toán giữa kì 2',
        'contentOptions' => [
            'style' => 'color:purple'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_cuoi_ky_1_toan',
        'label' => 'Điểm toán cuối kì 1',
        'contentOptions' => [
            'style' => 'color:purple'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_giua_ky_1_tv',
        'label' => 'Điểm tiéng việt giữa kì 1',
        'contentOptions' => [
            'style' => 'color:green'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_cuoi_ky_1_tv',
        'label' => 'Điểm tiéng việt cuối kì 1',
        'contentOptions' => [
            'style' => 'color:green'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_giua_ky_2_tv',
        'label' => 'Điểm tiéng việt giữa kì 2',
        'contentOptions' => [
            'style' => 'color:green'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_cuoi_ky_2_tv',
        'label' => 'Điểm tiéng việt cuối kì 2',
        'contentOptions' => [
            'style' => 'color:green'
        ],
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_cuoi_ky_1_ta',
        'label' => 'Điểm tiéng anh cuối kì 1',
        'contentOptions' => [
            'style' => 'color:red'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diem_cuoi_ky_2_ta',
        'label' => 'Điểm tiếng anh cuối kì 2',
        'contentOptions' => [
            'style' => 'color:red'
        ],
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'toan',
        'label' => 'Điểm toán trung bình',
        'contentOptions' => [
            'style' => 'color:purple'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tieng_viet',
        'label' => 'Điểm tiếng việt trung bình',
        'contentOptions' => [
            'style' => 'color:green'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tieng_anh',
        'label' => 'Điểm tiếng anh trung bình',
        'contentOptions' => [
            'style' => 'color:red'
        ],
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'xep_loai',
         'label' => 'Xếp loại',
     ],
//    [
//        'header' => "Hoạt động",
//        'width' => '20%',
//        'class'=>'\kartik\grid\ActionColumn',
//        'buttons' => [
////            'view' => function ($url, $model, $key){
////                return Html::a('<i class="fa fa-eye" ></i>',Url::toRoute(['hoc-sinh/view', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xem'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-success', 'style' => 'width:30px']);
////            },
//            'update' => function ($url, $model, $key){
//                return Html::a('<i class="fa fa-pen"></i>',Url::toRoute(['hoc-sinh/update-mark', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Sửa thông tin học sinh'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary', 'style' => 'width:30px']);
//            },
//
////            'delete' => function ($url, $model, $key){
////                return Html::a('<i class="fa fa-trash"></i>',Url::toRoute(['hoc-sinh/delete', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Xoá'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-danger', 'style' => 'width:30px',
////                    'data-confirm' => false,
////                    'data-method' => false,// for overide yii data api
////                    'data-request-method' => 'post',
////                    'data-toggle' => 'tooltip',
////                    'data-confirm-title' => Yii::t('yii2-ajaxcrud', 'Delete'),
////                    'data-confirm-message' => Yii::t('yii2-ajaxcrud', 'Delete Confirm')]);
////            },
//        ]
//    ],
      [
          'value' => function($model, $key){
              return Html::a('<i class="fa fa-pen"></i>',Url::toRoute(['hoc-sinh/update-mark', 'id' => $model->id]), ['role' => 'modal-remote',  'title' => Yii::t('yii2-ajaxcrud', 'Sửa thông tin học sinh'), 'data-toggle' => 'tooltip', 'class' => 'btn btn-sm btn-outline-primary', 'style' => 'width:30px']);
          },
          'label' => 'Sửa điểm',
          'format' => 'raw',
          'contentOptions' => ['class' => 'text-center text-danger','style'=>'width:3%;'],
          'headerOptions' => ['class' => 'text-center text-primary','style'=>'width:3%;']
      ]

];
