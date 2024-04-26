<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bang_diem_toan".
 *
 * @property int $ma_hoc_sinh
 * @property int $ma_giao_vien
 * @property int|null $diem_giua_ky_1
 * @property int|null $diem_cuoi_ky_1
 * @property int|null $diem_giua_ky_2
 * @property int|null $diem_cuoi_ky_2
 *
 * @property GiaoVien $maGiaoVien
 * @property HocSinh $maHocSinh
 */
class BangDiemToan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bang_diem_toan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_giao_vien'], 'required'],
            [['ma_hoc_sinh', 'ma_giao_vien', 'diem_giua_ky_1', 'diem_cuoi_ky_1', 'diem_giua_ky_2', 'diem_cuoi_ky_2'], 'integer'],
            [['ma_giao_vien'], 'exist', 'skipOnError' => true, 'targetClass' => GiaoVien::class, 'targetAttribute' => ['ma_giao_vien' => 'id']],
            [['ma_hoc_sinh'], 'exist', 'skipOnError' => true, 'targetClass' => HocSinh::class, 'targetAttribute' => ['ma_hoc_sinh' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ma_hoc_sinh' => 'Mã học sinh',
            'ma_giao_vien' => 'Mã giáo viên ',
            'diem_giua_ky_1' => 'Điểm giữa kỳ 1',
            'diem_cuoi_ky_1' => 'Điểm cuối kỳ 1',
            'diem_giua_ky_2' => 'Điểm giữa kỳ 2',
            'diem_cuoi_ky_2' => 'Điểm cuối kỳ 2',
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
    public static function findById($id)
    {
        return static::findOne(['ma_hoc_sinh' => $id]);
    }
}
