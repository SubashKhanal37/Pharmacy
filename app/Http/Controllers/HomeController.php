<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Models\Product;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->id == '1') Auth::user()->assignRole('Admin');
        if (Auth::user()->hasRole('Admin'))
            return view('home');
        else if (Auth::user()->hasRole('Pharmacy'))
            return view('frontend.Pharmacy.index');
        else {
            $data = Product::orderBy('created_at', 'DESC')->paginate(12);
            $featured = Product::where('feature', '1')->get();
            return view('frontend.Customer.dashboard')->with(compact('data', 'featured'));
        };
    }
    public function viewusers(Request $request)
    {
        $search = $request['Search'] ?? "";
        if ($search != "") {
            $data = User::where('name', 'Like', '%' . $search . '%')->orWhere('email', 'Like', '%' . $search . '%')->paginate(10);
        } else {
            $data = User::paginate(10);
        }
        $dat = compact('data', 'search');
        return view('frontend.users')->with($dat);
    }
    public function roles()
    {
        $search = $request['Search'] ?? "";
        if ($search != "") {
            $data = Role::where('name', 'Like', '%' . $search . '%')->paginate(10);
        } else {
            $data = Role::paginate(10);
        }
        $dat = compact('data', 'search');
        return view('frontend.roles')->with($dat);
    }
    public function showrole($id)
    {

        $role = Role::findById($id);
        $users = User::role($role['name'])->paginate(10);

        $rol = compact('role', 'users');
        return view('frontend.showrole')->with($rol);
    }
    public function createrole()
    {
        $permission = Permission::all();
        $perm = compact('permission');
        return view('frontend.createrole')->with($perm);
    }
    public function rolesubmit(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->permission;
        $role->syncPermissions($permissions);



        return redirect()->Route('roles');
    }

    public function editrole()
    {
    }

    public function deleterole($id)
    {
        $role = Role::findById($id);
        $role->delete();
        return redirect()->Route('roles');
    }
}
