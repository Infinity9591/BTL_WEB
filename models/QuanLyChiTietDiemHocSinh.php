<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_chi_tiet_diem_hoc_sinh".
 *
 * @property int $id
 * @property string $ten
 * @property string $ten_lop
 * @property int|null $diem_giua_ky_1_toan
 * @property int|null $diem_cuoi_ky_1_toan
 * @property int|null $diem_giua_ky_2_toan
 * @property int|null $diem_cuoi_ky_2_toan
 * @property float|null $toan
 * @property int|null $diem_giua_ky_1_tv
 * @property int|null $diem_cuoi_ky_1_tv
 * @property int|null $diem_giua_ky_2_tv
 * @property int|null $diem_cuoi_ky_2_tv
 * @property float|null $tieng_viet
 * @property int|null $diem_cuoi_ky_1_ta
 * @property int|null $diem_cuoi_ky_2_ta
 * @property float|null $tieng_anh
 * @property string|null $xep_loai
 */
class QuanLyChiTietDiemHocSinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_chi_tiet_diem_hoc_sinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'ten_lop'], 'required'],
            [['id', 'diem_cuoi_ky_1_toan', 'diem_cuoi_ky_2_toan', 'diem_giua_ky_1_toan', 'diem_giua_ky_2_toan', 'diem_giua_ky_1_tv', 'diem_cuoi_ky_1_tv', 'diem_giua_ky_2_tv', 'diem_cuoi_ky_2_tv', 'diem_cuoi_ky_1_ta', 'diem_cuoi_ky_2_ta'], 'integer'],
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
            'diem_giua_ky_1_toan' => 'Diem giua Ky 1 Toan',
            'diem_cuoi_ky_1_toan' => 'Diem Cuoi Ky 1 Toan',
            'diem_giua_ky_2_toan' => 'Diem giua Ky 2 Toan',
            'diem_cuoi_ky_2_toan' => 'Diem Cuoi Ky 2 Toan',
            'toan' => 'Toan',
            'diem_giua_ky_1_tv' => 'Diem Giua Ky 1 Tv',
            'diem_cuoi_ky_1_tv' => 'Diem Cuoi Ky 1 Tv',
            'diem_giua_ky_2_tv' => 'Diem Giua Ky 2 Tv',
            'diem_cuoi_ky_2_tv' => 'Diem Cuoi Ky 2 Tv',
            'tieng viet' => 'Tieng Viet',
            'diem_cuoi_ky_1_ta' => 'Diem Cuoi Ky 1 Ta',
            'diem_cuoi_ky_2_ta' => 'Diem Cuoi Ky 2 Ta',
            'tieng anh' => 'Tieng Anh',
            'xep_loai' => 'Xep Loai',
        ];
    }
}
