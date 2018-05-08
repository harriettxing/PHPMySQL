<?php
define('ENCRYPTION_KEY', "aea05f7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a23ee");

function encrypt_str($inStr) {

    $key = pack('H*', ENCRYPTION_KEY);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    //echo "iv size: ".$iv_size;
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encryptedStr = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $inStr, MCRYPT_MODE_CBC, $iv);
    $encryptedStr = $iv.$encryptedStr;
    $encryptedStr_64 = base64_encode($encryptedStr);

    return $encryptedStr_64;
}

$encrypted_Str_64 = encrypt_str($argv[1]);
echo argv[1].":".$encrypted_Str_64;

function decrypt_str($inStr) {

    $key = pack('H*', ENCRYPTION_KEY);
    $str_dec = base64_decode($inStr);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv_dec = substr($str_dec, 0, $iv_size);
    $str_dec = substr($str_dec, $iv_size);
    $decryptedStr = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $str_dec, MCRYPT_MODE_CBC, $iv_dec);

    return trim($decryptedStr);
}

$decrypted_Str = decrypt_str($encrypted_Str_64);

echo PHP_EOL.'*'.$decrypted_Str.'*'.PHP_EOL;

if (strcmp($decrypted_Str, 'asdfghjkl123')==0) echo "equal".PHP_EOL;
else echo "not equal".PHP_EOL;
?>
