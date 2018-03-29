<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use LaravelLegends\PtBrValidator\Validator;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return string
     */
    public function redirectTo()
    {
        return \Auth::user()->role == User::ROLE_ADMIN ? '/admin/home' : '/home';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        if ($request->is('admin/*')) {
            return redirect('/admin/login');
        }
        return redirect('/login');
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(),'password');
        $loginField = $this->getLoginField();

        if ($loginField != $this->username()) {
            $data[$this->getLoginField()] = $data[$this->username()];
            unset($data[$this->username()]);
        }

        return $data;
    }

    /**
     * Validates phone, cpf and email in login
     *
     * @return string
     */
    protected function getLoginField()
    {
        $loginField = \Request::get('email');

        $validator = \Validator::make(
            ['telefone' => $loginField],
            ['telefone' => 'required|celular_com_ddd']
        );

        if (!$validator->fails()) {
            return 'phone';
        }

        if (is_numeric($loginField)) {
            return 'cpf';
        }

        return 'email';
    }
}
