<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function userHelp(){
        return view('front.help.help');
    }

    public function aboutUs(){
        return view('front.help.about');
    }
}
