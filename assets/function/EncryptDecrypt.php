<?php
//namespace app\controllers\function;

namespace app\assets\function;

class EncryptDecrypt
{
    public static function encrypt($data, $key)
    {
        $iv = openssl_random_pseudo_bytes(16);
        $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);
        $encryptedWithIV = base64_encode($iv . $encrypted);
        return $encryptedWithIV;
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
   echo  EncryptDecrypt::encrypt("quanly", "tiengviet"."key").'<br/>';
//   echo  EncryptDecrypt::decrypt(EncryptDecrypt::encrypt("quanly", "adminkey"), "adminkey");
//   echo  EncryptDecrypt::decrypt('iTfZmuAp92fVcgMrImZsh1Nmb0V3N2xDV0ZIL3U1ZWJ5UC9tRGc9PQ==', "adminkey");
?>
