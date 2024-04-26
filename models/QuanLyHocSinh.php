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
 * @property float|null $tieng_viet
 * @property float|null $tieng_anh
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
            [['toan', 'tieng_viet', 'tieng_anh'], 'number'],
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
            'ten' => 'Tên',
            'ten_lop' => 'Lớp',
            'ngay_sinh' => 'Ngày sinh',
            'dia_chi' => 'Địa chỉ',
            'sdt_bome' => 'Số điện thoại bố mẹ',
            'toan' => 'Điểm toán',
            'tieng_viet' => 'Điểm tiếng Việt',
            'tieng_anh' => 'Điểm tiếng Anh',
            'xep_loai' => 'Xếp loại',
            'ghi_chu' => 'Ghi chú',
        ];
    }

    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
}
