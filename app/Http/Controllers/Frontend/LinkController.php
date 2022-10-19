<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Models\User;

class LinkController extends Controller
{
    public function index()
    {

        return  view('frontend.index');
    }
    public function signin()
    {
        return view('frontend.signin');
    }
    public function signup()
    {
        return view('frontend.signup');
    }
}
