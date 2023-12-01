<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register()
    {
        return view("admin.register");
    }

    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',

            'email' => 'required|email|unique:users|max:100',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|max:22',
            'cpassword' => 'required|min:6|same:password'
        ], [
            'cpassword.same' => 'Password did not matched!',
            'cpassword.required' => 'Confirm Password is required!'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = new Admin;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Registered Successfully'
            ]);
        }
    }

    public function login()
    {
        return view("admin.login");
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:22'
        ], [
            'email.required' => 'The email field must be filled.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field must be filled.',


        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {

            session()->flash('error', 'Either E-mail/Password is incorrect');
            return back()->withInput($request->only('error'));
        }









        //            $user = Admin::where('email', $request->email)->first();
        //            if ($user) {
        //                if (Hash::check($request->password, $user->password)) {
        //                    $request->session()->put('loggedInUser', $user->id);
        //                    return response()->json([
        //                        'status' => 200,
        //                        'messages' => 'Logged in Successfully',
        //
        //                    ]);
        //                } else {
        //                    return response()->json([
        //                        'status' => 401,
        //                        'messages' => 'E-mail or Password is incorrect'
        //                    ]);
        //                }
        //            } else {
        //                return response()->json([
        //                    'status' => 401,
        //                    'messages' => 'User not found'
        //                ]);
        //            }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }
}
