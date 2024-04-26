<?php

namespace app\models;

use app\assets\function\EncryptDecrypt;
use Yii;
use yii\base\NotSupportedException;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $password_hash
 * @property string $auth_key
 * @property int $ma_role
 * @property int $status
 *
 * @property GiaoVien[] $giaoViens
 * @property Role $maRole
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'ma_role', 'status'], 'required'],
            [['id', 'ma_role', 'status'], 'integer'],
            [['username', 'password', 'password_hash', 'auth_key'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['ma_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['ma_role' => 'id']],
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
            'password' => 'Password',
            'password_hash' => 'Mật khẩu',
//            'auth_key' => 'Auth Key',
            'ma_role' => 'Chức vụ',
            'status' => 'Tình trạng',
        ];
    }

    /**
     * Gets query for [[GiaoViens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiaoViens()
    {
        return $this->hasMany(GiaoVien::class, ['ma_account' => 'id']);
    }

    /**
     * Gets query for [[MaRole]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaRole()
    {
        return $this->hasOne(Role::class, ['id' => 'ma_role']);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    public function validatePassword($password){
        return $password === EncryptDecrypt::decrypt($this->password_hash, $this->auth_key);
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');;
    }
    public function  beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert){
                $authkey = $this->username."key";
                $password = EncryptDecrypt::encrypt($this->password_hash, $authkey);
                $this->password_hash = $password;
                return true;
            }
            else{
                $password = EncryptDecrypt::encrypt($this->password_hash, $this->auth_key);
                $this->password_hash = $password;
                return true;
            }
        }
        return false;
    }

}
