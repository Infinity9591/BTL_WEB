<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mon_hoc".
 *
 * @property int $id
 * @property string $ten_mon
 *
 * @property GiaoVien[] $giaoViens
 */
class MonHoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mon_hoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten_mon'], 'required'],
            [['id'], 'integer'],
            [['ten_mon'], 'string', 'max' => 50],
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
            'ten_mon' => 'Ten Mon',
        ];
    }

    /**
     * Gets query for [[GiaoViens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiaoViens()
    {
        return $this->hasMany(GiaoVien::class, ['ma_mon' => 'id']);
    }
}
