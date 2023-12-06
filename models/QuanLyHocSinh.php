<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_hoc_sinh".
 *
 * @property int $id
 * @property string $ten
 * @property string $ten_lop
 * @property string|null $ngay_sinh
 * @property string|null $dia_chi
 * @property string $sdt_bome
 * @property float|null $toan
 * @property float|null $tieng viet
 * @property float|null $tieng anh
 * @property string|null $xep_loai
 * @property string|null $ghi_chu
 */
class QuanLyHocSinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_hoc_sinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'ten_lop', 'sdt_bome'], 'required'],
            [['id'], 'integer'],
            [['ngay_sinh'], 'safe'],
            [['dia_chi', 'ghi_chu'], 'string'],
            [['toan', 'tieng viet', 'tieng anh'], 'number'],
            [['ten'], 'string', 'max' => 255],
            [['ten_lop'], 'string', 'max' => 5],
            [['sdt_bome'], 'string', 'max' => 15],
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
            'ngay_sinh' => 'Ngay Sinh',
            'dia_chi' => 'Dia Chi',
            'sdt_bome' => 'Sdt Bome',
            'toan' => 'Toan',
            'tieng viet' => 'Tieng Viet',
            'tieng anh' => 'Tieng Anh',
            'xep_loai' => 'Xep Loai',
            'ghi_chu' => 'Ghi Chu',
        ];
    }
}
