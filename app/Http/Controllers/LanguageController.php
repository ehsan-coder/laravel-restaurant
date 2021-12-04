<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    

    public function switch(Request $request, $locale){
        session(['APP_LOCALE' => $locale]);
        return redirect()->back();
    }
}
