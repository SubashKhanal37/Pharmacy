<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Session;
use App\Models\UserCode;
use Illuminate\Support\Facades\Auth;

class TwoFAController extends Controller
{
    public function index()
    {
        return view('2fa');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $find = UserCode::where('id', Auth::user()->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();

        if (!is_null($find)) {
            Session::put('user_2fa', Auth::user()->code);
            return redirect()->route('home');
        }

        return back()->with('error', 'You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        Auth::user()->generateCode();

        return back()->with('success', 'We sent you code on your mobile number.');
    }
}
