<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bang_diem_tieng_anh".
 *
 * @property int $ma_hoc_sinh
 * @property int $ma_giao_vien
 * @property int|null $diem_nghe
 * @property int|null $diem_noi
 * @property int|null $diem_doc
 * @property int|null $diem_viet
 *
 * @property GiaoVien $maGiaoVien
 * @property HocSinh $maHocSinh
 */
class BangDiemTiengAnh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bang_diem_tieng_anh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_giao_vien'], 'required'],
            [['ma_hoc_sinh', 'ma_giao_vien', 'diem_nghe', 'diem_noi', 'diem_doc', 'diem_viet'], 'integer'],
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
            'diem_nghe' => 'Diem Nghe',
            'diem_noi' => 'Diem Noi',
            'diem_doc' => 'Diem Doc',
            'diem_viet' => 'Diem Viet',
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
