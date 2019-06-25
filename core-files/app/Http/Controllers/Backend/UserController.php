<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::where('user_type',3)->get();
        return view('admin.user.index')->with([
            'users' => $users
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 3
        ]);

        return redirect()->back();
    }
    
    public function edit($id){
        $user = User::findOrFail($id);
        return response()->json($user,200);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        User::findOrFail($id)->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        if($request->password){
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            User::findOrFail($id)->update([
                'password' => bcrypt($request->password)
            ]);
        }
        
        return redirect()->back();

    }
    public function delete($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
