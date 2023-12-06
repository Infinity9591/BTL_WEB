<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "giao_vien".
 *
 * @property int $id
 * @property string $ten
 * @property string|null $ngay_sinh
 * @property string|null $dia_chi
 * @property string|null $sdt
 * @property int|null $ma_mon
 * @property int|null $ma_lop
 *
 * @property BangDiemTiengAnh[] $bangDiemTiengAnhs
 * @property BangDiemTiengViet[] $bangDiemTiengViets
 * @property BangDiemToan[] $bangDiemToans
 * @property Lop $maLop
 * @property MonHoc $maMon
 * @property User[] $users
 */
class GiaoVien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giao_vien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten'], 'required'],
            [['id', 'ma_mon', 'ma_lop'], 'integer'],
            [['ngay_sinh'], 'safe'],
            [['dia_chi'], 'string'],
            [['ten'], 'string', 'max' => 255],
            [['sdt'], 'string', 'max' => 15],
            [['id'], 'unique'],
            [['ma_mon'], 'exist', 'skipOnError' => true, 'targetClass' => MonHoc::class, 'targetAttribute' => ['ma_mon' => 'id']],
            [['ma_lop'], 'exist', 'skipOnError' => true, 'targetClass' => Lop::class, 'targetAttribute' => ['ma_lop' => 'id']],
            [['ngay_sinh'], 'default', 'value' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Họ và tên',
            'ngay_sinh' => 'Ngày sinh',
            'dia_chi' => 'Địa chỉ',
            'sdt' => 'Số điện thoại',
            'ma_mon' => 'Môn dạy',
            'ma_lop' => 'Lớp',
        ];
    }

    /**
     * Gets query for [[BangDiemTiengAnhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBangDiemTiengAnhs()
    {
        return $this->hasMany(BangDiemTiengAnh::class, ['ma_giao_vien' => 'id']);
    }

    /**
     * Gets query for [[BangDiemTiengViets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBangDiemTiengViets()
    {
        return $this->hasMany(BangDiemTiengViet::class, ['ma_giao_vien' => 'id']);
    }

    /**
     * Gets query for [[BangDiemToans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBangDiemToans()
    {
        return $this->hasMany(BangDiemToan::class, ['ma_giao_vien' => 'id']);
    }

    /**
     * Gets query for [[MaLop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaLop()
    {
        return $this->hasOne(Lop::class, ['id' => 'ma_lop']);
    }

    /**
     * Gets query for [[MaMon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaMon()
    {
        return $this->hasOne(MonHoc::class, ['id' => 'ma_mon']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['ma_giao_vien' => 'id']);
    }
}
