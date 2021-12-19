<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function users()
    {
        return User::orderBy('id')->get();
    }
    public function store(Request $request)
    {
        $store = new User();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->save();
        if ($store)
        {
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
}
