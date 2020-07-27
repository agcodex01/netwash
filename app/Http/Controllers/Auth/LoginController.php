<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;


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
    protected $redirectTo;

    public function redirectTo()
    {
        if(Auth::check()){
            $user = Auth::user();
            switch($user->role){
                case 1:
                    $this->redirectTo = route('admin.index');
                    return $this->redirectTo ;
                    break;

                case 2:
                    $this->redirectTo = route('laundries.dashboard');
                    return $this->redirectTo;
                    break;
                case 3:
                     $this->redirectTo = route('customers.dashboard');
                    return $this->redirectTo ;
                    break;
                case 4:
                     $this->redirectTo = route('branch.dashboard',[$user->staff->branch->laundry, $user->staff->branch]);
                    return $this->redirectTo;
                    break;
                default:
                    $this->redirectTo = '/login';
                    return $this->redirectTo;
            }
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
