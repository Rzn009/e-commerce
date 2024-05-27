<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Controller
{
    public function index() {
        $pending = Transaction::where('user_id', auth()->user()->id)->where('status','Pending')->count();
        $expired = Transaction::where('user_id', auth()->user()->id)->where('status','expired')->count();
        $settlement = Transaction::where('user_id', auth()->user()->id)->where('status','settlement')->count();        
        return view('pages.user.index', compact('pending','expired','settlement'));
    }
    public function listUser ()
    {
        $user = User::where('role','user')->get();

        return view('pages.admin.adminUser.listUser', compact('user'));

    }
    public function resetPassword($id){
        //get user by id
        $user = User::findOrFail($id);
        $user->password = Hash::make('password');
        $user->save();

        return redirect()->back()->with('success','password has been reset');    
    }
    public function changePassword()
    {
        return view('pages.user.edit');
    }
    public function updatePassword(Request $request)
    {
        //validate the request
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required',
            'confirmation_password' => 'required',
        ]);
        // check current password status
        $currentPasswordStatus = Hash::check(
            $request->current_password,
            auth()->user()->password
        );

        if ($currentPasswordStatus) {
            if ($request->password == $request->confirmation_password) {
                // update password
                // get user login by auth
                $user = auth()->user();

                // update password
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('user.dashboard')->with('success', "Your password has been updated successfully");
            } else {
                return redirect()->back()->with('error', 'Passwords does not match!');
            }
        } else {
            return redirect()->back()->with('error', 'Current Password is Wrong');
        }
    }
}
