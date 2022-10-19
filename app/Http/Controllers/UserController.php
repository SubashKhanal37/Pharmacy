<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('frontend.addUsers');
    }
    public function addUsers(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'min:10'],
        ]);
        $name = $request->avatar->getClientOriginalName();
        $request->avatar->storeAs('avatar', $name, 'public');

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'avatar' => $request['avatar']->getClientOriginalName(),
        ])->assignRole($request->role);
        return redirect(route('viewusers'));
    }
    public function editUser($id)
    {
        $user = User::find($id);
        return view('frontend.editUser')->with(compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
    }
    public function deleteUser(Request $request)
    {
        $user =  User::find($request->id);
        $user->delete();
        return redirect(route('viewusers'));
    }
}
