<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lop".
 *
 * @property int $id
 * @property string $ten_lop
 *
 * @property GiaoVien[] $giaoViens
 * @property HocSinh[] $hocSinhs
 */
class Lop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten_lop'], 'required'],
            [['id'], 'integer'],
            [['ten_lop'], 'string', 'max' => 5],
            [['ten_lop'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_lop' => 'Ten Lop',
        ];
    }

    /**
     * Gets query for [[GiaoViens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiaoViens()
    {
        return $this->hasMany(GiaoVien::class, ['ma_lop' => 'id']);
    }

    /**
     * Gets query for [[HocSinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHocSinhs()
    {
        return $this->hasMany(HocSinh::class, ['ma_lop' => 'id']);
    }
}
