<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_diem_hoc_sinh".
 *
 * @property int $id
 * @property string $ten
 * @property string $ten_lop
 * @property float|null $toan
 * @property float|null $tieng viet
 * @property float|null $tieng anh
 * @property string|null $xep_loai
 */
class QuanLyDiemHocSinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_diem_hoc_sinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'ten_lop'], 'required'],
            [['id'], 'integer'],
            [['toan', 'tieng viet', 'tieng anh'], 'number'],
            [['ten'], 'string', 'max' => 255],
            [['ten_lop'], 'string', 'max' => 5],
            [['xep_loai'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Ten',
            'ten_lop' => 'Ten Lop',
            'toan' => 'Toan',
            'tieng viet' => 'Tieng Viet',
            'tieng anh' => 'Tieng Anh',
            'xep_loai' => 'Xep Loai',
        ];
    }
}
