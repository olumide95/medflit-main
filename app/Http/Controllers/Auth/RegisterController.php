<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Patient;
use App\Models\Provider;
use App\Models\Pharmacy;
use App\Models\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
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
                'specialty_id' => 'required|integer',
                'country_id' => 'required|integer',
                'address' => 'required|max:255',
                'city_id' => 'required|integer',
                'state_id' => 'required|integer',
                'usertype' => 'required|integer',
                'licence_id' => 'required',
                'licence_expiry_date' => 'required|date',
                'medical_organization' => 'required',
                'tos' => 'required',

            ]);
        } else if($usertype == 4) {
            return Validator::make($data, [
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'country_id' => 'required|integer',
                'address' => 'required|max:255',
                'city_id' => 'required|integer',
                'state_id' => 'required|integer',
                'usertype' => 'required|integer',
                'tos' => 'required',
                'business_name' => 'required',
                'licence_id' => 'required',
                'licence_expiry_date' => 'required|date',
                'affiliation' => 'required',
            ]);
        } else if($usertype == 5) {
            return Validator::make($data, [
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'contact_firstname' => 'required|max:255',
                'contact_lastname' => 'required|max:255',
                'contact_phone' => 'required',
                'contact_email' => 'required|email|max:255',
                'company_name' => 'required|max:255',
                'company_phone' => 'required',
                'company_email' => 'required|email|max:255',
                'company_services' => 'required|max:255',
                'usertype' => 'required|integer',
                'tos' => 'required',
                'company_address' => 'required|max:255',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {      
        $usertype = intval($data['usertype']);
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'usertype' => $usertype,            
        ]);

        if($usertype == 2) {
            $this->redirectTo = '/patient/index';
            if($user) {
                Patient::create([
                    'user_id' => $user['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'address' => null, 
                    'city_id' => null,
                    'state_id' => null,
                    'gender' => null,
                    'country_id' => null,
                    'photo_url' => null,
                    'date_of_birth' => null,
                ]);
                
            }
        } else if($usertype == 3) {
            $this->redirectTo = '/provider/index';
            if($user) {
                Provider::create([
                    'user_id' => $user['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'country_id' => $data['country_id'],
                    'address' => $data['address'],
                    'city_id' => $data['city_id'],
                    'state_id' => $data['state_id'],
                    'specialty_id' => $data['specialty_id'],
                    'licence_id' => $data['licence_id'],
                    'licence_expiry_date' => $data['licence_expiry_date'],
                    'medical_organization' => $data['medical_organization'],
                ]);
            }
        } else if($usertype == 4) {
            $this->redirectTo = '/pharmacy/index';
            if($user) {
                Pharmacy::create([
                    'user_id' => $user['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'country_id' => $data['country_id'],
                    'address' => $data['address'],
                    'city_id' => $data['city_id'],
                    'state_id' => $data['state_id'],
                    'business_name' => $data['business_name'],
                    'licence_id' => $data['licence_id'],
                    'licence_expiry_date' => $data['licence_expiry_date'],
                    'affiliation' => $data['affiliation'],
                ]);
            }
        } else if($usertype == 5) {
            $this->redirectTo = '/partner/index';
            if($user) {
                Partner::create([
                    'user_id' => $user['id'],
                    'contact_firstname' => $data['contact_firstname'],
                    'contact_lastname' => $data['contact_lastname'],
                    'contact_email' => $data['contact_email'],
                    'contact_phone' => $data['contact_phone'],
                    'company_name' => $data['company_name'],
                    'company_services' => $data['company_services'],
                    'company_email' => $data['company_email'],
                    'company_phone' => $data['company_phone'],
                    'company_address' => $data['company_address'],
                ]);
            }
        }

        return $user;
    }

    public function showPatientRegistrationForm()
    {        
        return view('patient.register', ['title'=>'Patient Registration']);
    }

    public function showProviderRegistrationForm()
    {        
        return view('provider.register', ['title'=>'Provider Registration']);
    }

    public function showPharmacyRegistrationForm()
    {        
        return view('pharmacy.register', ['title'=>'Pharmacy Registration']);
    }

    public function showPartnerRegistrationForm()
    {        
        return view('partner.register', ['title'=>'Partner Registration']);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('patient.register', ['title'=>'Patient Registration']);
    }
}
