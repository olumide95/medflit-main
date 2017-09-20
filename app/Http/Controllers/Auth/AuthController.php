<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Patient;
use App\Provider;
use App\Pharmacy;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'patient/index';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $usertype = intval($data['usertype']);

        if($usertype == 2) {
            return Validator::make($data, [
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                /*'dob' => 'required|date',
                'gender' => 'required|max:15',
                'country' => 'required|integer',
                'address' => 'required|max:255',
                'city' => 'required|integer',
                'state' => 'required|integer',*/
                'usertype' => 'required',
                'tos' => 'required',

            ]);
        } else if($usertype == 3) {
            return Validator::make($data, [
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                /*'gender' => 'required|max:15',
                'country' => 'required|integer',
                'address' => 'required|max:255',
                'city' => 'required|integer',
                'state' => 'required|integer',*/
                'usertype' => 'required',
                'tos' => 'required',
                'specialty' => 'required',

            ]);
        } else if($usertype == 4) {
            return Validator::make($data, [
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'gender' => 'required|max:15',
                'country' => 'required|integer',
                'address' => 'required|max:255',
                'city' => 'required|integer',
                'state' => 'required|integer',
                'usertype' => 'required',
                'tos' => 'required',
                'pharmacy_name' => 'required',

            ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'usertype' => $data['usertype'],
        ]);

        $usertype = intval($data['usertype']);

        if($usertype == 2) {
            $this->redirectTo = '/patient/index';
            if($user) {
                Patient::create([
                    'user_id' => $user['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    /*'gender' => $data['gender'],
                    'country_id' => $data['country'],
                    'address' => $data['address'],
                    'dob' => $data['dob'],
                    'city_id' => $data['city'],
                    'state_id' => $data['state'],*/
                ]);
                
            }
        } else if($usertype == 3) {
            $this->redirectTo = '/provider/index';
            if($user) {
                Provider::create([
                    'user_id' => $user['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'gender' => $data['gender'],
                    'country_id' => $data['country'],
                    'address' => $data['address'],
                    'city_id' => $data['city'],
                    'state_id' => $data['state'],
                    'specialty' => $data['specialty'],
                ]);
            }
        } else if($usertype == 4) {
            $this->redirectTo = '/pharmacy/index';
            if($user) {
                Pharmacy::create([
                    'user_id' => $user['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'gender' => $data['gender'],
                    'country_id' => $data['country'],
                    'address' => $data['address'],
                    'city_id' => $data['city'],
                    'state_id' => $data['state'],
                    'pharmacy_name' => $data['pharmacy_name'],
                ]);
            }
        }

        return $user;
        
    }

    public function showRegistrationForm1()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register');
    }

    public function showPatientRegistrationForm()
    {        
        return view('patient.register', ['title'=>'Patient Registration']);
    }

    public function showProviderRegistrationForm()
    {        
        return view('provider.register');
    }

    public function showPharmacyRegistrationForm()
    {        
        return view('pharmacy.register');
    }

    public function login(Request $request)
    {
        if (is_numeric($request->input('login'))) {
            $field = 'phone';
        } elseif (filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }
        
        $request->merge([$field => $request->input('login')]);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only($field, 'password'); //var_dump($credentials);exit;

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        return redirect('/login')->withErrors([
            'error' => 'These credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        $request->session()->flash('reg-success', 'Thanks for signing up! Please check your email.');
                
        $confirmation_code = str_random(30);
        $data = [];
        $data['confirmation_code'] = $confirmation_code;
        Mail::send('emails.verify', $confirmation_code, function($message) {
            $message->to(Input::get('email'), Input::get('username'))
                ->subject('Verify your email address');
        });

        return redirect($this->redirectPath());
    }

}
