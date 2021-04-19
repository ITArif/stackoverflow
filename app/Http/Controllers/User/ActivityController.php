<?php

namespace App\Http\Controllers\User;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function activity(){
        $question = Question::where('user_id',Auth::user()->id)->get();
        $answer = Answer::where('user_id',Auth::user()->id)->get();
        return view('front.profile.activity')
            ->with('question',$question)
            ->with('answer',$answer);
    }
}
