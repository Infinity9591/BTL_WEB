<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_ly_user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $password_hash
 * @property string $ten
 * @property string $ten_role
 */
class QuanLyUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quan_ly_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'ten', 'ten_role'], 'required'],
            [['id'], 'integer'],
            [['username', 'password_hash', 'ten'], 'string', 'max' => 255],
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
            'username' => 'Tài khoản',
//            'password_hash' => 'Password Hash',
            'ten' => 'Người sử dụng',
            'ten_role' => 'Tên chức vụ',
        ];
    }
}
