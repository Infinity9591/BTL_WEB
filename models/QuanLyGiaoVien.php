<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_giao_vien".
 *
 * @property int $id
 * @property string $username
 * @property string $ten
 * @property string|null $ngay_sinh
 * @property string $ten_lop
 * @property string $ten_mon
 * @property string|null $dia_chi
 * @property string|null $sdt
 * @property string $ten_role
 * @property string $trang_thai
 */
class QuanLyGiaoVien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_giao_vien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'ten', 'ten_lop', 'ten_mon', 'ten_role', 'trang_thai'], 'required'],
            [['id'], 'integer'],
            [['ngay_sinh'], 'safe'],
            [['dia_chi'], 'string'],
            [['username', 'ten'], 'string', 'max' => 255],
            [['ten_lop'], 'string', 'max' => 5],
            [['ten_mon'], 'string', 'max' => 50],
            [['sdt'], 'string', 'max' => 15],
            [['ten_role'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'ten' => 'Ten',
            'ngay_sinh' => 'Ngay Sinh',
            'ten_lop' => 'Ten Lop',
            'ten_mon' => 'Ten Mon',
            'dia_chi' => 'Dia Chi',
            'sdt' => 'Sdt',
            'ten_role' => 'Ten Role',
            'trang_thai' => "Trang Thai"
        ];
    }


}
