<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_lop".
 *
 * @property int $id
 * @property string $ten_lop
 * @property int $so_hoc_sinh
 */
class QuanLyLop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_lop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ten_lop'], 'required'],
            [['id', 'so_hoc_sinh'], 'integer'],
            [['ten_lop'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_lop' => 'Tên lớp',
            'so_hoc_sinh' => 'Số học sinh',
        ];
    }
}
