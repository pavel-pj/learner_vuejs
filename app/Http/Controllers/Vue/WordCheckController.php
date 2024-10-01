<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WordCheckController extends Controller
{

    public function options() {
        return view('vue.learn.options');
    }

    public function easyStart() {

        return view('vue.learn.easy-start');

    }

}
