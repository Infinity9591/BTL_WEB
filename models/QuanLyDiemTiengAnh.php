<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_diem_tieng_anh".
 *
 * @property int $ma_hoc_sinh
 * @property int $ma_giao_vien
 * @property int|null $diem_ky_1
 * @property int|null $diem_ky_2
 * @property float|null $diem_trung_binh_nam
 * @property string|null $xep_loai
 */
class QuanLyDiemTiengAnh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_diem_tieng_anh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_giao_vien'], 'required'],
            [['ma_hoc_sinh', 'ma_giao_vien', 'diem_ky_1', 'diem_ky_2'], 'integer'],
            [['diem_trung_binh_nam'], 'number'],
            [['xep_loai'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ma_hoc_sinh' => 'Ma Hoc Sinh',
            'ma_giao_vien' => 'Ma Giao Vien',
            'diem_ky_1' => 'Diem Ky 1',
            'diem_ky_2' => 'Diem Ky 2',
            'diem_trung_binh_nam' => 'Diem Trung Binh Nam',
            'xep_loai' => 'Xep Loai',
        ];
    }
}
