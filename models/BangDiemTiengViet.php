<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bang_diem_tieng_viet".
 *
 * @property int $ma_hoc_sinh
 * @property int $ma_giao_vien
 * @property int|null $diem_doc_giua_ky
 * @property int|null $diem_viet_giua_ky
 * @property int|null $diem_doc_cuoi_ky
 * @property int|null $diem_viet_cuoi_ky
 *
 * @property GiaoVien $maGiaoVien
 * @property HocSinh $maHocSinh
 */
class BangDiemTiengViet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bang_diem_tieng_viet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_giao_vien'], 'required'],
            [['ma_hoc_sinh', 'ma_giao_vien', 'diem_doc_giua_ky', 'diem_viet_giua_ky', 'diem_doc_cuoi_ky', 'diem_viet_cuoi_ky'], 'integer'],
            [['ma_hoc_sinh'], 'exist', 'skipOnError' => true, 'targetClass' => HocSinh::class, 'targetAttribute' => ['ma_hoc_sinh' => 'id']],
            [['ma_giao_vien'], 'exist', 'skipOnError' => true, 'targetClass' => GiaoVien::class, 'targetAttribute' => ['ma_giao_vien' => 'id']],
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
            'diem_doc_giua_ky' => 'Diem Doc Giua Ky',
            'diem_viet_giua_ky' => 'Diem Viet Giua Ky',
            'diem_doc_cuoi_ky' => 'Diem Doc Cuoi Ky',
            'diem_viet_cuoi_ky' => 'Diem Viet Cuoi Ky',
        ];
    }

    /**
     * Gets query for [[MaGiaoVien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaGiaoVien()
    {
        return $this->hasOne(GiaoVien::class, ['id' => 'ma_giao_vien']);
    }

    /**
     * Gets query for [[MaHocSinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaHocSinh()
    {
        return $this->hasOne(HocSinh::class, ['id' => 'ma_hoc_sinh']);
    }
}
