<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\User\CreateUserRequest;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $auth;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        //$this->middleware('guest', ['except' => 'getLogout',]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request, UserService $user)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request-> has("remember");
        $log = $user->login($credentials, $remember, $this->auth);
        return redirect()->action('HomeController@getIndex');
    }
    public function getLogout()
    {
        Session::flush();
        $this->auth->logout();
        return redirect('auth/login');
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(CreateUserRequest $request, UserService $user)
    {
        $input = $request->all();
        $reg = $user->register($input);
        if($reg['status'] == 'success')
        {
            return redirect('auth/login');
        }
        return redirect()->back();
    }
}
