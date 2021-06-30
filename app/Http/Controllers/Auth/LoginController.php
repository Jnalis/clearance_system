<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'user_id' => $request->user_id,
            'password' => $request->password,
        ])) {
            if (Auth::user()->user_type == 'Admin') {

                return redirect(route('admin.home'));
                
            } else if (Auth::user()->user_type == 'HOD') {

                return redirect(route('hod.home'));

            } else if (Auth::user()->user_type == 'RA') {

                return redirect(route('ra.home'));

            } else if (Auth::user()->user_type == 'Dean') {

                return redirect(route('dean.home'));

            } else if (Auth::user()->user_type == 'Registrar') {

                return redirect(route('registrar.home'));
                
            } else if (Auth::user()->user_type == 'Bursar') {

                return redirect(route('bursar.home'));
                
            } else if (Auth::user()->user_type == 'Student') {
                
                return redirect(route('student.home'));
            }
        } else {
            return back()->with('fail','Check your credentials');
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
