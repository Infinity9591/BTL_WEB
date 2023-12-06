<?php

namespace app\models;

use app\assets\function\EncryptDecrypt;
use Yii;
use yii\base\NotSupportedException;
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
 * @property int $ma_giao_vien
 * @property int $status
 *
 * @property GiaoVien $maGiaoVien
 * @property Role $maRole
 *
 * @property User $user
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
            [['id', 'username', 'auth_key', 'ma_role', 'ma_giao_vien', 'password_hash', 'status'], 'required'],
            [['id', 'ma_role', 'ma_giao_vien', 'status'], 'integer'],
            [['username', 'password', 'password_hash', 'auth_key'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['ma_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['ma_role' => 'id']],
            [['ma_giao_vien'], 'exist', 'skipOnError' => true, 'targetClass' => GiaoVien::class, 'targetAttribute' => ['ma_giao_vien' => 'id']],
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
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'ma_role' => 'Ma Role',
            'ma_giao_vien' => 'Ma Giao Vien',
            'status' => 'Trang Thai'
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
     * Gets query for [[MaRole]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaRole()
    {
        return $this->hasOne(Role::class, ['id' => 'ma_role']);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
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

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
//    public function validatePassword($password)
//    {
//        return $this->password === $password;
//    }

    public function validatePassword($password){
        return $password === EncryptDecrypt::decrypt($this->password_hash, $this->auth_key);
    }


}
