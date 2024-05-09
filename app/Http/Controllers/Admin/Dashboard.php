<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Controller
{
    public function index() {
        $category = Category::count();
        $product = Product::count();
        $user = User::where('role','user')->count();
        return view('pages.admin.index', compact('category','product','user'));
    }

    public function resetPassword($id){
        //get user by id
        $user = User::find($id);
        $user->password = Hash::make('password');
        $user->save();

        return redirect()->back()->with('success','password has been reset');    
    }

    public function listUser ()
    {
        $user = User::where('role','user')->get();

        return view('pages.admin.adminUser.listUser', compact('user'));

    }
    

    


}

