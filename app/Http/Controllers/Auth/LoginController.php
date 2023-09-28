<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginWithToken(Request $request)
    {
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
        $data = $guzzleClient->request('POST', 'https://gowcm.pupuk-indonesia.com/api/login?username=' . $request->email . '&' . 'password=' . $request->password);

        $authorizationHeader = $data->getHeader('Authorization');

        // putenv('GET_TOKEN=' . $authorizationHeader[0]);
        $path = base_path('.env');
        $test = file_get_contents($path);
        $currentEnv = env('GET_TOKEN');

        if (file_exists($path)) {
            file_put_contents($path, str_replace('GET_TOKEN=' . $currentEnv, 'GET_TOKEN=' . $authorizationHeader[0], $test));
        }

        if ($data->getStatusCode() === 200) {
            return view('realisasi.realisasiIndex');
        }
    }
}
