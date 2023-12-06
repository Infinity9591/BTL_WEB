<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hoc_sinh".
 *
 * @property int $id
 * @property string $ten
 * @property int $ma_lop
 * @property string|null $ngay_sinh
 * @property string|null $dia_chi
 * @property string $sdt_bome
 *
 * @property BangDiemTiengAnh[] $bangDiemTiengAnhs
 * @property BangDiemTiengViet[] $bangDiemTiengViets
 * @property BangDiemToan[] $bangDiemToans
 * @property Lop $maLop
 */
class HocSinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hoc_sinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'ma_lop', 'sdt_bome'], 'required'],
            [['id', 'ma_lop'], 'integer'],
            [['ngay_sinh'], 'safe'],
            [['dia_chi'], 'string'],
            [['ten'], 'string', 'max' => 255],
            [['sdt_bome'], 'string', 'max' => 15],
            [['id'], 'unique'],
            [['ma_lop'], 'exist', 'skipOnError' => true, 'targetClass' => Lop::class, 'targetAttribute' => ['ma_lop' => 'id']],
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
            'ma_lop' => 'Ma Lop',
            'ngay_sinh' => 'Ngay Sinh',
            'dia_chi' => 'Dia Chi',
            'sdt_bome' => 'Sdt Bome',
        ];
    }

    /**
     * Gets query for [[BangDiemTiengAnhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBangDiemTiengAnhs()
    {
        return $this->hasMany(BangDiemTiengAnh::class, ['ma_hoc_sinh' => 'id']);
    }

    /**
     * Gets query for [[BangDiemTiengViets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBangDiemTiengViets()
    {
        return $this->hasMany(BangDiemTiengViet::class, ['ma_hoc_sinh' => 'id']);
    }

    /**
     * Gets query for [[BangDiemToans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBangDiemToans()
    {
        return $this->hasMany(BangDiemToan::class, ['ma_hoc_sinh' => 'id']);
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
}
