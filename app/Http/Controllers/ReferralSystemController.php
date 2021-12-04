<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Http\Controllers\UserSystemInfoController;
use App\Models\User;

class ReferralSystemController extends Controller
{
    protected $user;
    protected $requestData;

    function __construct(){
        $this->user = new User();
        $this->requestData = Request()->all(); 
    }

    // public static function generateRandomString($length = 6) {
    //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     $charactersLength = strlen($characters);
    //     $randomString = '';
    //     for ($i = 0; $i < $length; $i++) {
    //         $randomString .= $characters[rand(0, $charactersLength - 1)];
    //     }
    //     return $randomString;
    // }
public static function encryptString($stringToCrypt){

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "restubono";
  
$encryption = openssl_encrypt($stringToCrypt, $ciphering,
            $encryption_key, $options, $encryption_iv);
  
return $encryption;
    }

    public static function decryptString($stringToDecrypt){

$decryption_iv = '1234567891011121';
$decryption_key = "restubono";
$options = 0;
$ciphering = "AES-128-CTR";

$decryption=openssl_decrypt ($stringToDecrypt, $ciphering, 
        $decryption_key, $options, $decryption_iv);
  

return $decryption;
    }



}
