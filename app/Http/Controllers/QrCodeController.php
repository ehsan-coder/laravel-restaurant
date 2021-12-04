<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;

class QrCodeController extends Controller
{
    

    public function generateQrCode(){
       $qr = QrCode::size(250)
        ->backgroundColor(255, 255, 204)
        ->generate('ehsan ite');

     return $qr;
    }
}
