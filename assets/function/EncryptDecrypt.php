<?php
namespace app\assets\function;

use app\models\User;
use Yii;

class EncryptDecrypt
{

    public static function encrypt($data, $key)
    {
        $iv = openssl_random_pseudo_bytes(16);
        $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);
        $encryptedWithIV = base64_encode($iv . $encrypted);
//        echo $iv." ";
        return $encryptedWithIV;
//        return hash_hmac('sha256', $data, $key);
    }

    public static function decrypt($data, $key)
    {
        $decodedData = base64_decode($data);
        $ivSize = 16;
        $iv = substr($decodedData, 0, $ivSize);
        $encryptedData = substr($decodedData, $ivSize);
        $decrypted = openssl_decrypt($encryptedData, "aes-256-cbc", $key, 0, $iv);
        return $decrypted;
    }
}
?>
<?php
//
//   $encrypt = EncryptDecrypt::encrypt("quanly", "adminkey");
//   echo $encrypt;
//   echo  EncryptDecrypt::decrypt($encrypt, "adminkey");
//   echo EncryptDecrypt::decrypt('xGuUsf+q+DX4YlKknm3W1HloTkZNeWZ2S2wrN0Z0WnQwL3FQeUE9PQ==', "amenkey");
?>
