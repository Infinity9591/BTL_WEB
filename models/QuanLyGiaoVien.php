<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
// * @property string $trang_thai
 */
class QuanLyGiaoVien extends ActiveRecord
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
            [['id', 'username', 'ten', 'ten_lop', 'ten_mon', 'ten_role'], 'required'],
            [['id'], 'integer'],
            [['ngay_sinh'], 'safe'],
            [['dia_chi'], 'string'],
            [['username', 'ten'], 'string', 'max' => 255],
            [['ten_lop'], 'string', 'max' => 5],
            [['ten_mon'], 'string', 'max' => 50],
            [['sdt'], 'string', 'max' => 15],
            [['ten_role'], 'string', 'max' => 20],
//            [['trang_thai'], 'string', 'max' => 18],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tên tài khoản',
            'ten' => 'Tên',
            'ngay_sinh' => 'Ngày sinh',
            'ten_lop' => 'Tên lớp',
            'ten_mon' => 'Tên môn',
            'dia_chi' => 'Địa chỉ',
            'sdt' => 'Số điện thoại',
            'ten_role' => 'Tên chức vụ',
//            'trang_thai' => 'Trang Thai',
        ];
    }
    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
//    public static function getIdAccountByUsername($username){
//        return User::findByUsername($username);
//    }
    public static function findByIdUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
}
